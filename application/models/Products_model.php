<?php

/**
 * Developer:Moshahed Alam.
 * Email: moshahed777@gmail.com
 * Date: 01-July-2019
 */
class Products_model extends CI_Model {
    
    public function search_porduct($search_value)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('status',1);
        $this->db->like('name', $search_value);
        $this->db->limit(40);
        //$this->db->order_by('id', 'desc');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    
    public function getProductDetails($slug)
    {
        return $this->db
                ->select('*')
                ->where('status',1)
                ->where('id',$slug)
                ->or_where('slug',$slug)
                ->get('products')
                ->row();
    }
    public function getProductImage($product_id)
    {
        return $this->db
                ->select('*')
                ->where('status',1)
                ->where('product_id',$product_id)
                ->get('product_img')
                ->result();
    }
    
    public function getAllCategory(){
        return $this->db
                ->select('*')
                ->where('status',1)
                ->order_by('display_order','ASC')
                ->get('category')
                ->result();
    }
    
    public function getAllProductsBySubcategoryWise($sub_category_id,$limit=24,$order_by='id')
    {
        return $this->db
                ->select('*')
                ->where('status',1)
                ->where('sub_category_id',$sub_category_id)
                ->order_by($order_by,'DESC')
                ->limit($limit)
                ->get('products')
                ->result();
    }
    public function getAllProductsByCategoryWise($category_id, $limit=100,$order_by='id' )
    {
        return $this->db
                ->select('*')
                ->where('status',1)
                ->where('category_id',$category_id)
                ->order_by($order_by,'DESC')
                ->limit($limit)
                ->get('products')
                ->result();
    }
    
    public function getProductsByCategoryWise($category,$order_by,$limit){
        
        foreach($category as $cat){
            $result[] = $this->db
                    ->select('*')
                    ->where('status',1)
                    ->where('category_id',$cat->id)
                    ->order_by($order_by,'DESC')
                    ->limit($limit)
                    ->get('products')
                    ->result();            
        }        
        return $result;
    }
    
    public function getAllProducts($limit=20,$order_by='id')
    {
        return $this->db
                ->select('*')
                ->where('status',1)
                ->group_by('category_id')
                ->order_by($order_by,'DESC')
                ->limit($limit)
                ->get('products')
                ->result();
    }
    public function getRelatedProducts($limit=8,$order_by='id',$product_type,$product_id)
    {
        return $this->db
                ->select('*')
                ->where('status',1)
                ->where('product_type',$product_type)
//                ->where('id !=',$product_id)
                ->order_by($order_by,'DESC')
                ->limit($limit)
                ->get('products')
                ->result();
    }
    
    /** Best Selling Products */
   
    public function getBestSellingProducts()
    {
        $SQL="SELECT * from products where id IN (SELECT products.id FROM products inner join delivery_item on products.id = delivery_item.product_id GROUP BY delivery_item.product_id HAVING count(delivery_item.product_id) >10 and products.status =1) limit 8";
        $query = $this->db->query($SQL);
        return $query->result_array();
    }
    public function getAllBestSellingProducts()
    {
        $SQL="SELECT * from products where id IN (SELECT products.id FROM products inner join delivery_item on products.id = delivery_item.product_id GROUP BY delivery_item.product_id HAVING count(delivery_item.product_id) >10 and products.status =1) ";
        $query = $this->db->query($SQL);
        return $query->result_array();
    }

    public function best_selling_product_ids()
    {
        $SQL="SELECT products.id from products where id IN (SELECT products.id FROM products inner join delivery_item on products.id = delivery_item.product_id GROUP BY delivery_item.product_id HAVING count(delivery_item.product_id) >10 and products.status =1) ";
        $query = $this->db->query($SQL);
        return $query->result_array();
    }

    // new arrivel product 
    public function getNewArrivelProducts()
    {
        $SQL="SELECT * from products
        where created_at>now() - interval 16 month limit 8";

        $query = $this->db->query($SQL);
        return $query->result_array();
    }

    public function getAllNewArrivelProducts()
    {
        $SQL="SELECT * from products
        where created_at>now() - interval 16 month";
        $query = $this->db->query($SQL);
        return $query->result_array();
    }

    /** Get Related Products */
    public function getRelatedProductsCategory($product_id)
    {
        // $SQL="select * FROM products WHERE category_id IN (SELECT category_id FROM products WHERE id = $product_id); ";
        // $query = $this->db->query($SQL);
        // return $query->result_array();

        return $this->db
                ->select('category_id')
                ->where('status',1)
                ->where('id',$product_id)
                ->get('products')
                ->result();
    }
    public function getRelatedProductRating($product_id)
    {
         $SQL="SELECT (SUM(qty)/count(id)) * 100 as rating from delivery_item where product_id = $product_id";
         
         return (int)$this->db->query($SQL)->row()->rating;
    }
}