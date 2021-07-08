<?php

namespace App\Admin\Controllers;

use App\Customer;
use App\Order;
use App\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Order';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order()); 
        

        $grid->column('id', __('Id'));
        $grid->column('order_number', __('Order Number')); 
        $grid->column('customer.username', __('Customer'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        $grid->filter(function ($filter) {
            $filter->like('order_number', 'Order Number');
        });

        $grid->filter(function ($filter) {
            $filter->like('customer.username', 'Customer');
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
        $show = new Show(Order::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('order_number', __('Order Number'));
        $show->field('customer.username', __('Customer')); 
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->orderItems(function ($product) {   
            $product->products()->name();  
            $product->qtn();  
        });

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Order());

        $form->number('order_number', __('Order Number')); 
        $form->select('user_id')->options(Customer::all()->pluck('username', 'id'));  
  
        $form->hasMany('orderItems', 'Products',function (Form\NestedForm $form) { 
            $form->select('product_id')->options(Product::all()->pluck('name', 'id')); 
            $form->number('qtn', __('Qtn'));
        }); 

        return $form;
    }
}
