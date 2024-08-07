<?php
namespace app\core;
class Validate {
    protected $errors = [];

    public function check($method, $items = []) {
        foreach($items as $item => $rules) {
            foreach($rules as $rule => $rule_value) {
                if($method !== $_FILES) {
                    $value = trim($method[$item]);
                }

                if(($rule === 'required' && empty($value))) {
                    $this->addError($item, "$item là trường bắt buộc nhập!");
                }else if(!empty($value)) {
                    switch($rule) {
                        case 'min':
                            if(strlen($value) < $rule_value) {
                                $this->addError($item, "$item phải lớn hơn $rule_value ký tự!");
                            }
                            break;
                        case 'max':
                            if(strlen($value) > $rule_value) {
                                $this->addError($item, "$item phải nhỏ hơn $rule_value ký tự!");
                            }
                            break;
                        case 'matches':
                            if($value !== $method[$rule_value]) {
                                $this->addError($item, "$item không khớp với $rule_value");
                            }
                            break;
                        case 'notMatches':
                            if($value === $method[$rule_value]) {
                                $this->addError($item, "$item trùng với với $rule_value");
                            }
                            break;
                        case 'email':
                            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                                $this->addError($item, "$item phải có định dạng email!");
                            }
                            break;
                        case 'image':
                            if (!in_array($method[$item]['type'], $rule_value)) {
                                $this->addError($item, "$item phải là ảnh!");
                            }
                            break;
                        case 'maxSize':
                            if ($method[$item]['size'] > $rule_value) {
                                $this->addError($item, "$item có kích thước vượt quá 2MB!");
                            }
                            break;
                    }
                }
            }
        }
    }

    public function addError($field, $error) {
        $this->errors[$field] = $error;
    }

    public function getErrors() {
        return $this->errors;
    }
}