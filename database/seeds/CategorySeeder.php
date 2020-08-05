<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::query()->truncate();

        $name = array('Book', 'Comic Book', 'History', 'Dreds', 'Child Dress', 'Women Dress', 'Travel');
        $parent_id = array('0', '1', '1', '0', '4', '4', '1');
        
        for($i=0 ; $i<count($name); $i++){
            $category = new Category(array(
                'name'    => $name[$i],
                'parent_id'    => $parent_id[$i],
            ));

            $category->save();
        }
    }
}
