<?php
namespace App\Components;
use App\Category;

class CategoryRecusive 
{
    private $html ="";

    public function getParentCategory($id, $text, $parents_id = false)
    {
        $getCategories = Category::all();
        foreach ($getCategories as  $value) {
            if($value->parent_id == $id) {
                if($parents_id == $value->id){
                    $this->html.= "<option selected value=".$value->id.">".$text .$value->name. "</option>";
                    $this->getParentCategory($value->id, $text."-",$parents_id);
                }else{
                    $this->html.= "<option value=".$value->id.">".$text .$value->name. "</option>";
                    $this->getParentCategory($value->id, $text."-",$parents_id);
                }
            }
        }
        return $this->html;
    }
    
}




?>