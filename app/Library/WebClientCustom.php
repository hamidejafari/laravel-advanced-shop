<?php

namespace App\Library;
use DOMDocument;

class WebClientCustom
{
    private $ch;
    private $cookie = '_identity-frontend=e2f9aea69be96a4aac104ab183f5c768e084098847b6fc8e3763e86a1fef0cbda%3A2%3A%7Bi%3A0%3Bs%3A18%3A%22_identity-frontend%22%3Bi%3A1%3Bs%3A50%3A%22%5B16649%2C%2213b98c56122537fcc47721a6804160ee%22%2C2592000%5D%22%3B%7D; Path=/; Domain=.adsy.com; Expires=Sat, 12 Mar 2022 12:32:32 GMT;';
    private $html;

    public function Navigate($url, $post = array())
    {
        curl_setopt($this->ch, CURLOPT_URL, $url);
        curl_setopt($this->ch, CURLOPT_COOKIE, $this->cookie);


        if (!empty($post)) {
            curl_setopt($this->ch, CURLOPT_POST, TRUE);
           curl_setopt($this->ch, CURLOPT_POSTFIELDS, $post);
        }
        $response = $this->exec();
        if ($response['Code'] !== 200) {
            return FALSE;
        }
        //echo curl_getinfo($this->ch, CURLINFO_HEADER_OUT);
        return $response['Html'];
    }

    public function getInputs()
    {
        $return = array();

        $dom = new DOMDocument();
        @$dom->loadHtml($this->html);
        $inputs = $dom->getElementsByTagName('input');
        foreach($inputs as $input)
        {
            if ($input->hasAttributes() && $input->attributes->getNamedItem('name') !== NULL)
            {
                if ($input->attributes->getNamedItem('value') !== NULL)
                    $return[$input->attributes->getNamedItem('name')->value] = $input->attributes->getNamedItem('value')->value;
                else
                    $return[$input->attributes->getNamedItem('name')->value] = NULL;
            }
        }

        return $return;
    }

    public function __construct()
    {
        $this->init();
    }

    public function __destruct()
    {
        $this->close();
    }

    private function init()
    {
        $this->ch = curl_init();
        curl_setopt($this->ch, CURLOPT_USERAGENT, "Mozilla/6.0 (Windows NT 6.2; WOW64; rv:16.0.1) Gecko/20121011 Firefox/16.0.1");
        curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($this->ch, CURLOPT_MAXREDIRS, 5);
        curl_setopt($this->ch, CURLINFO_HEADER_OUT, TRUE);
        curl_setopt($this->ch, CURLOPT_HEADER, TRUE);
        curl_setopt($this->ch, CURLOPT_AUTOREFERER, TRUE);
    }

    private function exec()
    {
        $headers = array();
        $html = '';

        ob_start();
        curl_exec($this->ch);
        $output = ob_get_contents();
        ob_end_clean();

        $retcode = curl_getinfo($this->ch, CURLINFO_HTTP_CODE);

        if ($retcode == 200) {
            $separator = strpos($output, "\r\n\r\n");

            $html = substr($output, $separator);

            $h = trim(substr($output,0,$separator));
            $lines = explode("\n", $h);
            foreach($lines as $line) {
                $kv = explode(':',$line);

                if (count($kv) == 2) {
                    $k = trim($kv[0]);
                    $v = trim($kv[1]);
                    $headers[$k] = $v;
                }
            }
        }

        // TODO: it would deserve to be tested extensively.
        if (!empty($headers['Set-Cookie']))
            $this->cookie = $headers['Set-Cookie'];

        $this->html = $html;

        return array('Code' => $retcode, 'Headers' => $headers, 'Html' => $html);
    }

    private function close()
    {
        curl_close($this->ch);
    }
}
