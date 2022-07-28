<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $errors=[
            'title_ar' => 'nullable',
            'title_en' => 'required_without:title_ar',
            'des_ar' => 'nullable',
            'des_en' =>'required_without:des_ar',

            'default_currency' => 'required|in:eg,em',
            'main_image' =>'nullable|image',
            'images'=>'nullable',
            'old_price' => 'required',
            /*  'product_type' => 'required|in:upcoming,normal',*/
            'have_offer' => 'required|in:with_offer,without_offer',
           /* 'sub_department_id' => 'required',*/
            'brand_id' => 'required',
            'tags' => 'required',
            'shipping_way' => 'required|in:vendor,yalahwy',
            'shipping_price' => 'required',
            'shipping_days' => 'required',
            'weight' => 'nullable',
            'price_type' => 'required|in:single,multi',
            'police_tab_lable' => 'nullable',
            'shipping_policy' => 'nullable',
            'refund_policy' => 'nullable',
            'cancel_return_ex_police' => 'nullable',
        ];

        //-----------------product type---------------------
        /*  if ($this->product_type == 'upcoming'){
              $custom=[
                  'upcoming_date' => 'required|date',
                  'upcoming_time' => 'required',
              ];
             $errors=array_merge(
                $custom ,$errors

             );
          }*/

        //-----------------have type---------------------
        if ($this->have_offer == 'with_offer'){
            $custom= [
                'offer_type' => 'required|in:rate,value',
            ];
            $errors=array_merge(
                $custom
                ,$errors

            );
            //rate for offer
            if ($this->offer_value == 'rate') {
                $custom= [
                    'offer_value'=>'required|lte:100',
                ];
                $errors = array_merge(
                    $custom
                    , $errors

                );
            }
        }
        //-----------------price type------------------------
        if ($this->price_type == 'multi'){

            $custom=  [
                'parent_id' => 'required',
                'parent_value' => 'required',
                'final_price' => 'required',
            ];
            $errors=array_merge(
                $custom
                ,$errors

            );
        }

        if ($this->price_type == 'single'){
            $custom= [
                'price' => 'required',
            ];
            $errors=array_merge(
                $custom
                ,$errors

            );
        }
        return $errors;
    }//end fun

    public function messages()
    {
        $messages=[
            'main_image.image'=>trans('store.ImageValidator'),
            'sub_department_id.required'=>trans('store.DepartmentValidator'),
            'brand_id.required'=>trans('store.BrandValidator'),
            'tags.required'=>trans('store.TagValidator'),
           /* 'sku.unique'=>trans('store.UniqueValidatorSku'),*/
            'title_en.required_without'=>trans('store.required_without_title'),
            'des_ar.required_without'=>trans('store.required_without_des'),
        ];

        //-----------------product type---------------------
        /*  if ($this->product_type == 'upcoming'){
              $custom=[
                  'upcoming_date.required'=>trans('store.upcoming_date_validator'),
                  'upcoming_time.required'=>trans('store.upcoming_time_validator'),
              ];
              $messages=array_merge(
                  $custom ,$messages

              );
          }*/

        //-----------------price type------------------------
        if ($this->price_type == 'multi'){


            $messages=array_merge(
                [
                    'parent_id.required'=>trans('store.parent_id_attribute_validator'),
                    'parent_value.required'=>trans('store.parent_value_attribute_validator'),
                    'final_price.required'=>trans('store.final_price_validator'),
                ]
                ,$messages

            );
        }

        if ($this->price_type == 'single'){
            $messages=array_merge(
                [
                    'price.required'=>trans('store.price_attribute_validator'),
                ]
                ,$messages

            );
        }
        return $messages;
    }//end fun
}//end class
