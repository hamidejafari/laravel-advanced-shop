<?php namespace app\Library;

    use Illuminate\Support\Facades\Input;
    use Illuminate\Pagination\LengthAwarePaginator as Paginator;
    use Illuminate\Support\Facades\Request;
    use URL;

class MakeTree {

    private static $data;
    private static $generated;


    public static function getData($data) {

        self::$data      = null;
        self::$generated = null;

        foreach($data as $key => $value) {

            self::$data[$value['parent_id']][] = $value;

        }

    }

    public static function GenerateList($options = array()) {

        $class                = '';
        $options['parent_id'] = isset($options['parent_id']) ? $options['parent_id'] : null;
        $options['class']     = isset($options['class']) ? $options['class'] : '';

        if(!empty(self::$data[$options['parent_id']])) {
            if(is_null(self::$generated)) {
                if(!empty($options['class'])) {
                    $class = 'class="'.$options['class'].'"';
                }

            }
            self::$generated .= '<ul '.$class.'>';
            foreach(self::$data[$options['parent_id']] as $key => $value) {
                self::$generated .= '<li>'.$value['name'];
                self::GenerateList(array('parent_id' => $value['id']));
                self::$generated .= '</li>';
            }
            self::$generated .= '</ul>';

        }

        return self::$generated;
    }

    public static function GenerateCheckbox($options = array()) {

        $class                = '';
        $options['parent_id'] = isset($options['parent_id']) ? $options['parent_id'] : null;
        $options['class']     = isset($options['class']) ? $options['class'] : '';
        $options['name']      = isset($options['name']) ? $options['name'] : 'checks';

        if(!empty(self::$data[$options['parent_id']])) {
            if(is_null(self::$generated)) {
                if(!empty($options['class'])) {
                    $class = 'class="'.$options['class'].'"';
                }

            }
            self::$generated .= '<ul '.$class.'>';
            foreach(self::$data[$options['parent_id']] as $key => $value) {
                self::$generated .= '<li>';
                self::$generated .= '<input type="checkbox" name="'.$options['name'].'[]" value="'.$value['id'].'">'.$value['name'];
                self::GenerateCheckbox(array('parent_id' => $value['id'],
                                             'name'      => $options['name']));
                self::$generated .= '</li>';
            }
            self::$generated .= '</ul>';

        }

        return self::$generated;
    }

    public static function GenerateSelect($options = array(), $level = 0) {

        $options['parent_id'] = isset($options['parent_id']) ? $options['parent_id'] : null;
        $options['separator'] = isset($options['separator']) ? $options['separator'] : '-';

        if(!empty(self::$data[$options['parent_id']])) {

            foreach(self::$data[$options['parent_id']] as $key => $value) {
                self::$generated[$value['id']] = str_repeat($options['separator'], $level * 1).$value['title'];

                self::GenerateSelect(array('parent_id' => $value['id'],
                                           'separator' => $options['separator']), $level + 1);

            }

        }

        return self::$generated;
    }

    public static function GenerateGroup($options = array()) {

        $nullTemp             = array();
        $options['parent_id'] = isset($options['parent_id']) ? $options['parent_id'] : null;
        $options['default']   = isset($options['default']) ? $options['default'] : null;
        foreach(self::$data as $key => $value) {

            foreach($value as $k => $v) {
                if(is_null($v['parent_id'])) {
                    self::$generated[$v['id']] = array();
                    $nullTemp[$v['id']]        = $v['name'];
                } else {
                    self::$generated[$v['parent_id']][$v['id']] = $v['name'];
                }

            }

        }
        foreach(self::$generated as $genKey => $genValue) {
            if(array_key_exists($genKey, $nullTemp)) {
                self::$generated += array($nullTemp[$genKey] => $genValue);
                unset(self::$generated[$genKey]);
            }
        }
        if(!is_null($options['default'])) {

            array_unshift(self::$generated, $options['default']);
        }

        return self::$generated;
    }

    public static function GenerateArray($options = array(), $level = 0) {

        $options['parent_id'] = isset($options['parent_id']) ? $options['parent_id'] : null;
        $options['separator'] = isset($options['separator']) ? $options['separator'] : '-';

        if(!empty(self::$data[$options['parent_id']])) {

            foreach(self::$data[$options['parent_id']] as $key => $value) {
                $value['title']     = str_repeat($options['separator'], $level * 1).$value['title'];
                self::$generated[] = $value;

                self::GenerateArray(array('parent_id' => $value['id'],
                                          'separator' => $options['separator']), $level + 1);

            }

        }


        if(isset($options['paginate'])) {

            $page    = null;
            $perPage = $options['paginate'];
            $page    = $page ? (int) $page * 1 : Request::get('page', 1);
            $offset  = ($page * $perPage) - $perPage;
            $paginate = new Paginator(array_slice(self::$generated, $offset, $perPage, true), count(self::$generated), $perPage);
            $paginate->setPath(URL::current());
            $paginate->url(URL::current());
            return $paginate;
        }

        return self::$generated;
    }
}
