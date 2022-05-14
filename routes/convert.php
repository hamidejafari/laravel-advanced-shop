<?php


Route::get('/convert-categories', 'Site\ConvertController@convertCategories');
Route::get('/convert-products', 'Site\ConvertController@convertProducts');
Route::get('/convert-brands', 'Site\ConvertController@convertBrands');
Route::get('/convert-images', 'Site\ConvertController@convertImages');
Route::get('/convert-images2', 'Site\ConvertController@fixProductSecondImages');
Route::get('/replace-image-names', 'Site\ConvertController@replaceImageNames');
Route::get('/maincatredirect', 'Site\RedirectController@mainCat');
Route::get('/subcatredirect', 'Site\RedirectController@subCat');
Route::get('/subcatredirect2', 'Site\RedirectController@subCat2');
Route::get('/proredirect', 'Site\RedirectController@product');
Route::get('/brandredirect', 'Site\RedirectController@brand');
Route::get('/convert-seo', 'Site\ConvertController@convertSeo');
Route::get('/convert-order', 'Site\ConvertController@convertOrder');
Route::get('/convert-des', 'Site\ConvertController@getDes');
Route::get('/convert-price', 'Site\ConvertController@convertBlack');


Route::get('/fix-spfs', 'Site\ConvertController@fixSpfs');
Route::get('/fix-inventory', 'Site\ConvertController@fixInventory');
Route::get('/convert-product-barcode', 'Site\ConvertController@convertProductBarcode');


Route::get('/convert-categories-des', 'Site\ConvertController@convertCategoriesDes');
