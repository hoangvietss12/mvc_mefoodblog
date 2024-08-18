<?php
class CategoryModel extends Model {
    public function create($data) {
        $status = $this->db->table('categories')->insert($data);
        $this->db->resetQuery();

        return $status;
    }

    public function updateCategoryById($id, $data) {
        $status = $this->db->table('categories')->where('id', '=', $id)->update($data);
        $this->db->resetQuery();

        return $status;
    }

    public function deleteCategoryById($id) {
        $status = $this->db->table('categories')->where('id', '=', $id)->delete();
        $this->db->resetQuery();

        return $status;
    }

    public function getCategories() {
        $status = $this->db->table('categories AS child')
            ->select('child.id AS id, child.name AS name, parent.name AS parent_name')
            ->leftJoin('categories AS parent', 'CONVERT(child.parent_id, SIGNED) = parent.id')
            ->get();

        $this->db->resetQuery();

        return $status;
    }

    public function getCategoryById($id) {
        $status = $this->db->table('categories')->where('id', '=', $id)->first();

        return $status;
    }

    public function getCategoriesByName($name) {
        $status = $this->db->table('categories AS child')
            ->select('child.id AS id, child.name AS name, parent.name AS parent_name')
            ->leftJoin('categories AS parent', 'CONVERT(child.parent_id, SIGNED) = parent.id')
            ->whereLike('child.name', $name)
            ->get();
        $this->db->resetQuery();

        return $status;
    }

    public function getParentCategory() {
        $status = $this->db->table('categories')->where('parent_id', '=', '')->get();

        return $status;
    }
}