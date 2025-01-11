<?php

namespace Core;

use Core\Session;

class FH
{
    public static function inputBlock($type, $label, $name, $value = '', $inputAttrs = [], $divAttrs = [])
    {
        $divString = self::stringifyAttrs($divAttrs);
        $inputString = self::stringifyAttrs($inputAttrs);
        $html = '<div' . $divString . '>';
        $html .= '<label for="' . $name . '" class="m-1">' . $label . '</label>';
        $html .= '<input type="' . $type . '" id="' . $name . '" name="' . $name . '" value="' . $value . '"' . $inputString . ' />';
        $html .= '</div>';
        return $html;
    }

    public static function submitTag($buttonText, $inputAttrs = [])
    {
        $inputString = self::stringifyAttrs($inputAttrs);
        $html = '<input type="submit" value="' . $buttonText . '"' . $inputString . ' />';
        return $html;
    }

    public static function submitBlock($buttonText, $inputAttrs = [], $divAttrs = [])
    {
        $divString = self::stringifyAttrs($divAttrs);
        $inputString = self::stringifyAttrs($inputAttrs);
        $html = '<div' . $divString . '>';
        $html .= '<input type="submit" value="' . $buttonText . '"' . $inputString . ' />';
        $html .= '</div>';
        return $html;
    }

    public static function checkboxBlock($label,$name,$checked=false,$inputAttrs=[],$divAttrs=[]){
        $divString = self::stringifyAttrs($divAttrs);
        $inputString = self::stringifyAttrs($inputAttrs);
        $checkString = ($checked)? ' checked="checked"' : '';
        $html = '<div'.$divString.'>';
        $html .= '<label for="'.$name.'">'.$label.' <input type="checkbox" id="'.$name.'" name="'.$name.'" value="on"'.$checkString.$inputString.'></label>';
        $html .= '</div>';
        return $html;
      }

      public static function optionsForSelect($options,$selectedValue){
        $html = "";
        foreach($options as $value => $display){
          $selectedStr = ($value == $selectedValue)? ' selected="selected"' : "";
          $html .= '<option value="'.$value.'"'.$selectedStr.'>'.$display.'</option>';
        }
        return $html;
      }

      public static function selectBlock($label,$name,$value,$options,$inputAttrs=[],$divAttrs=[]){
        $divString = self::stringifyAttrs($divAttrs);
        $inputString = self::stringifyAttrs($inputAttrs);
        $id = str_replace('[]','',$name);
        $html = '<div' . $divString . '>';
        $html .= '<label for="'.$id.'" class="control-label">' . $label . '</label>';
        $html .= '<select id="'.$id.'" name="'.$name.'"'.$inputString.'>'.self::optionsForSelect($options,$value).'</select>';
        $html .= '</div>';
        return $html;
      }

    public static function inputTextarea($label, $name, $value, $inputAttrs = [], $divAttrs = [])
    {
        $divString = self::stringifyAttrs($divAttrs);
        $inputString = self::stringifyAttrs($inputAttrs);
    
        $html = '<div' . $divString . '>';
        $html .= '<label for="' . $name . '" class="m-1">' . $label . '</label>';
        $html .= '<textarea id="' . $name . '" name="' . $name . '"' . $inputString . '>' . htmlspecialchars($value) . '</textarea>';
        $html .= '</div>';
    
        return $html;
    }

    public static function inputRadio($label, $name, $value, $checked = false, $inputAttrs = [], $divAttrs = [])
{
    $divString = self::stringifyAttrs($divAttrs);
    $inputString = self::stringifyAttrs($inputAttrs);
    $checkString = ($checked) ? ' checked="false"' : '';

    $html = '<div' . $divString . '>';
    $html .= '<label for="' . $value . '">' . $label . '</label>';
    $html .= '<input type="radio" id="' . $value . '" name="' . $name . '" value="' . $value . '"' . $checkString . $inputString . ' />';
    $html .= '</div>';

    return $html;
}

    public static function stringifyAttrs($attrs)
    {
        $string = '';
        foreach ($attrs as $key => $value) {
            $string .= ' ' . $key . '="' . $value . '"';
        }
        return $string;
    }

    public static function generateToken()
    {
        $token = base64_encode(openssl_random_pseudo_bytes(32));
        Session::set('csrf_token', $token);
        return $token;
    }

    public static function checkToken($token)
    {
        return (Session::exists('csrf_token') && Session::get('csrf_token')) == $token;
    }

    public static function csrfInput()
    {
        return '<input type="hidden" name="csrf_token" id="csrf_token" value="' . self::generateToken() . '" />';
    }

    public static function hiddenInput($name,$value){
        $html = '<input type="hidden" name="'.$name.'" id="'.$name.'" value="'.$value.'" />';
        return $html;
      }

    //Sanitize function
    public static function sanitize($dirty)
    {
        return htmlentities($dirty, ENT_QUOTES, 'UTF-8');
    }

    public static function posted_values($post)
    {
        $clean_arr = [];
        foreach ($post as $key => $val) {
            $clean_arr[$key] = self::sanitize($val);
        }
        return $clean_arr;
    }

    public static function displayErrors($errors)
    {
        $hasErrors = (!empty($errors)) ? ' has-errors' : '';
        $html = '<div class="form-errors text-center"><ul class="bg-danger rounded-bottom' . $hasErrors . '">';
        foreach ($errors as $field => $error) {
            $html .= '<li class="text-white">' . $error . '</li>';
            $html .= '<script>jQuery("document").ready(function(){jQuery("#' . $field . '").addClass("is-invalid")});</script>';
        }
        $html .= '</ul></div>';
        return $html;
    }
}
