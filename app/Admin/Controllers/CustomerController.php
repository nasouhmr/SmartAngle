<?php

namespace App\Admin\Controllers;

use App\Customer;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CustomerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Customer';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Customer());

        $grid->column('id', __('Id'));
        $grid->column('username', __('Username'));
        $grid->column('email', __('Email')); 
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
  
        $grid->filter(function ($filter) {
            $filter->like('username', 'Username');
        }); 

        $grid->filter(function ($filter) {
            $filter->like('email', 'email');
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
        $show = new Show(Customer::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('username', __('Username'));
        $show->field('email', __('Email')); 
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Customer()); 
        $form->text('username', __('username')); 
        $form->text('email', __('email'));
        $form->text('password', __('password'));  
        return $form;
    }
}
