<?php

namespace App\Admin\Controllers;

use App\Admin\Forms\Category;
use App\Category as AppCategory;
use App\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Product';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('description', __('Description'));
        $grid->column('price', __('Price'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('category.name', __('Category'));

        $grid->filter(function ($filter) {
            $filter->like('name', 'Product Name');
        }); 

        $grid->filter(function ($filter) {
            $filter->like('price', 'Price');
        }); 

        $grid->filter(function ($filter) {
            $filter->between('created_at', 'create at')->datetime();
        });

        $grid->filter(function ($filter) {
            $filter->between('updated_at', 'updated at')->datetime();
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('description', __('Description'));
        $show->field('price', __('Price'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('category.name', __('Category'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Product());

        $form->text('name', __('Name'));
        $form->select('category_id')->options(AppCategory::all()->pluck('name', 'id')); 
        $form->textarea('description', __('Description'));
        $form->number('price', __('Price'));

        return $form;
    }
}
