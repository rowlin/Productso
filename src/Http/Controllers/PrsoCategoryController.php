<?php

namespace rowlin\productso\Http\Controllers;
use App\Http\Controllers\Controller;
use rowlin\productso\Models\PrsoCategory as Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PrsoCategoryController extends Controller
{

    public function show($slug='root')
    {
        // Если запрос пришел не на конкретную категорию, а на раздел категорий, отдаем коллекцию категорий верхнего уровня
        if ($slug == 'root')
        {
            $nodes= Category::whereIsRoot()->get();
            $many = true;
            return view('Productso::category_show', compact('nodes','many'));
        }
        // Иначе отдаем запрашиваемую категорию
        if ( $node = Category::where('slug',$slug)->first()) {
            $many = false;
            return view('Productso::category_show', compact('node','many'));
        }
        // ну или посылаем на 404 если нет такой
        abort(404);
    }
}