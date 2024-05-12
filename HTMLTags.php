<?php 


namespace HtmlTag;

class Tag {

    protected $tag;
    protected $attributes = [];
    protected $elements = [];
    protected  $content;

    public function __construct($tag){
        $this->tag = $tag;
    }

    

    public function setAttribute($attr, $value){
        $this->attributes[$attr] =  $value;
        return $this;
    }
    
    public function setValue($value){
        $this->attributes['value'] = $value;
        return $this;
        
    }

    public function setId($id){
        $this->attributes['id'] = $id;
        return $this;
    }

    public function setClass($class){
        $this->attributes['class'] = $class;
        return $this;
    }

    public function setElement($el){
        $this->elements[] = $el;
        return $this;
    }

    public function setTextContent($text) {
        $this->content = $text;
        return $this; 
    }

    public function getTextContent(){
        return $this->content;
    }

    public function getAttributes(){
        $attrString = '';
        foreach ($this->attributes as $name => $value) {
            $attrString .= "$name=\"$value\" ";
        }
        return trim($attrString);
    }

    public function saveAttributes(){
        $attrString = '';
        foreach($this->attributes as $name => $value){
            $attrString .= "$name=\"$value\"";
        }
        return "<{$this->tag} {$attrString}>{$this->content}</{$this->tag}>";
    }

    public function saveElements(){
        $elemString = '';
        foreach($this->elements as $name => $value){
            $elemString .= "$name=\"$value\"";
        }
        return "<{$this->tag}{$elemString}> {$this->content}</{$this->tag}> ";
    }


    public function singleClosedTag(){
        $singleTag = '';
        foreach($this->elements as $name => $value){
            $singleTag .= "$name=\"$value\"";
        }
        return "<{$this->tag}{$singleTag}/>";
    }
    

    public function openTag(){
        $openTag = '';
        foreach($this->elements as $name => $value){
            $openTag .= "$name=\"$value\"";
        }
        return "<{$this->tag}{$openTag}>";
    }
}



class HTMLList extends Tag{
    public function __construct() {
        parent::__construct('li');
    }

    public function setAttribute($attr, $value){
        $this->attributes[$attr] =  $value;
        return $this;
    }

    public function setClass($class){
        $this->attributes['class'] = $class;
        return $this;
    }

    public function setTextContent($text) {
        $this->content = $text;
        return $this; 
    }

    public function setElement($el){
        $this->elements[] = $el;
        return $this;
    }

    public function saveElements(){
        $elemString = '';
        foreach($this->elements as $element){
            if (is_object($element)) {
                $elemString .= $element->saveElements();
            }
        }

        $attrString = '';
        foreach($this->attributes as $name => $value){
            $attrString .= "$name=\"$value\"";
        }

        
        return "<{$this->tag} {$attrString}>{$this->content}{$elemString}</{$this->tag}>";
    }
}


class HTMLOrderedList extends Tag{

    protected $items = [];

    public function __construct() {
        parent::__construct('ol');
    }

    public function addItem($item) {
        $li = new Tag('li');
        $li->setTextContent($item);
        $this->items[] = $li;
        return $this;
    }

    public function saveElements() {
        $listContent = '';
        foreach ($this->items as $item) {
            $listContent .= $item->saveElements();
        }
        return parent::openTag() . $listContent . "</$this->tag>";
    }

}

class HTMLUnorderedList extends Tag{

    protected $items = [];

    public function __construct() {
        parent::__construct('ul');
    }

    public function addItem($item, $attributes = []) {
    $li = new Tag('li');
    
    if (!empty($attributes)) {
        foreach ($attributes as $attr => $value) {
            $li->setAttribute($attr, $value);
                 
        
        }
    }
    
    if ($item instanceof Tag) {
        $li->setElement($item);
    } else {

        $li->setTextContent($item);
    }

    $this->items[] = $li;
    return $this;
}


    public function saveElements() {
        $listContent = '';
        foreach ($this->items as $item) {
            // Check if the item is an instance of Tag before using saveElements
            if ($item instanceof Tag) {
                $listContent .= $item->saveAttributes();
            } else {
                // If it's not a Tag instance, directly append it (e.g., for plain text)
                $listContent .= $item;
            }
        }
        return parent::openTag() . $listContent . "</$this->tag>";
    }

}   



class HTMLAnchor extends Tag {
    public function __construct() {
        parent::__construct('a ');
    }

    public function setHref($url) {
        return $this->setAttribute('href', $url);
    }

    public function setAttribute($attr, $value){
        $this->attributes[$attr] =  $value;
        return $this;
    }

    public function setClass($class){
        $this->attributes['class'] = $class;
        return $this;
    }

    public function setTextContent($text) {
        $this->content = $text;
        return $this; 
    }

    public function setElement($el){
        $this->elements[] = $el;
        return $this;
    }

    public function saveElements(){
        $elemString = '';
        foreach($this->elements as $element){
            if (is_object($element)) {
                $elemString .= $element->saveElements();
            }
        }

        $attrString = '';
        foreach($this->attributes as $name => $value){
            $attrString .= "$name=\"$value\"";
        }

        
        return "<{$this->tag} {$attrString}>{$this->content}{$elemString}</{$this->tag}>";
    }
}


class HTMLTable extends Tag {
    protected $rows = [];

    public function __construct() {
        parent::__construct('table');
    }


    public function addHeader($cells) {
        $tr = new Tag('tr');
             foreach ($cells as $cellContent) {
                $th = new Tag('th');
                $th->setTextContent($cellContent);
                $tr->content .= $th->saveElements();

        }
        $this->rows[] = $tr;
        return $this; 
    }

    public function addRow($cells) {
        $tr = new Tag('tr');
        foreach ($cells as $cellContent) {
            $td = new Tag('td');
            $td->setTextContent($cellContent);
            $tr->content .= $td->saveElements();
        }
        $this->rows[] = $tr;
        return $this; 
    }


    public function saveRow() {
        $tableContent = ' ';
        foreach ($this->rows as $row) {
            $tableContent .= $row->saveElements();
        }
        return $tableContent; 
    }

    public function openTag() {
        return parent::openTag() . $this->saveRow() . "</{$this->tag}>";
    }
}

class HTMLImage extends Tag {
    public function __construct() {
        parent::__construct('img');
    }

    public function setSrc($src) {
        return $this->setAttribute('src', $src);
    }

    public function setAlt($alt) {
        return $this->setAttribute('alt', $alt);
    }
}


class HTMLinput extends Tag{

    
    
    public function __construct(){
        parent::__construct('input');
    }
    public function setType($type){

        $this->setAttribute('type', $type);
        return $this;
    }

  
}

class HTMLform extends Tag{

    public function __construct(){
        parent::__construct('form');
    }

    public function setAction($action){
        $this->setAttribute('action', $action);
        return $this;
    }

    public function setMethod($method){
        $this->setAttribute('method', $method);
        return $this;
    }
}


class HTMLDiv extends Tag {

    public function __construct(){
        parent::__construct('div');
    }
    
    public function setElement($el){
        $this->elements[] = $el;
        return $this;
    }

    public function saveElements(){
        $elemString = '';
        foreach($this->elements as $element){
          
            if (is_object($element)) {
                $elemString .= $element->saveElements();
            }
        }

        $attrString = '';
        foreach($this->attributes as $name => $value){
            $attrString .= "$name=\"$value\"";
        }

        return "<{$this->tag} {$attrString}>{$elemString}</{$this->tag}>";
    }


}

class HTMLLabel extends Tag {
    public function __construct() {
        parent::__construct('label');
    }
}

class HTMLh1 extends Tag {

    public function __construct(){
        parent::__construct('h1');
    }

    public function setAttribute($attr, $value){
        $this->attributes[$attr] =  $value;
        return $this;
    }

    public function setElement($el){
        $this->elements[] = $el;
        return $this;
    }


}

class HTMLh2 extends Tag {

    public function __construct(){
        parent::__construct('h2');
    }

        public function setTextContent($text) {
           
            $this->content = $text;
            return $this; 
        }
    
        public function setAttribute($attr, $value){
            $this->attributes[$attr] =  $value;
            return $this;
        }
    
        public function setElement($el){
            $this->elements[] = $el;
            return $this;
        }
    
        public function saveElements(){
            $elemString = '';
            foreach($this->elements as $element){
                if (is_object($element)) {
                    $elemString .= $element->saveElements();
                }
            }
    
            $attrString = '';
            foreach($this->attributes as $name => $value){
                $attrString .= "$name=\"$value\"";
            }
    
            
            return "<{$this->tag} {$attrString}>{$this->content}{$elemString}</{$this->tag}>";
        }

}

class HTMLh3 extends Tag {

    public function __construct(){
        parent::__construct('h3');
    }

    public function setClass($class){
        $this->attributes['class'] = $class;
        return $this;
    }

    public function setTextContent($text) {
           
        $this->content = $text;
        return $this; 
    }

    public function setAttribute($attr, $value){
        $this->attributes[$attr] =  $value;
        return $this;
    }

    public function setElement($el){
        $this->elements[] = $el;
        return $this;
    }

    public function saveElements(){
        $elemString = '';
        foreach($this->elements as $element){
            if (is_object($element)) {
                $elemString .= $element->saveElements();
            }
        }

        $attrString = '';
        foreach($this->attributes as $name => $value){
            $attrString .= "$name=\"$value\"";
        }

        
        return "<{$this->tag} {$attrString}>{$this->content}{$elemString}</{$this->tag}>";
    }

}

class HTMLh4 extends Tag {

    public function __construct(){
        parent::__construct('h4');
    }

}

class HTMLh5 extends Tag {

    public function __construct(){
        parent::__construct('h5');
    }

}

class HTMLh6 extends Tag {

    public function __construct(){
        parent::__construct('h6');
    }

}

class HTMLbutton extends Tag {
    public function __construct() {
        parent::__construct('button');
    }
}

class HTMLp extends Tag {

    public function __construct(){
        parent::__construct('p');
    }

    
    public function setTextContent($text) {
           
        $this->content = $text;
        return $this; 
    }

    public function setAttribute($attr, $value){
        $this->attributes[$attr] =  $value;
        return $this;
    }

    public function setElement($el){
        $this->elements[] = $el;
        return $this;
    }

    public function saveElements(){
        $elemString = '';
        foreach($this->elements as $element){
            if (is_object($element)) {
                $elemString .= $element->saveElements();
            }
        }

        $attrString = '';
        foreach($this->attributes as $name => $value){
            $attrString .= "$name=\"$value\"";
        }

        
        return "<{$this->tag} {$attrString}>{$this->content}{$elemString}</{$this->tag}>";
    }
}

class HTMLBr extends Tag {
    public function __construct() {
        parent::__construct('br');
    }
}


class HTMLSpan extends Tag {
    public function __construct() {
        parent::__construct('span');
    }

    public function setAttribute($attr, $value){
        $this->attributes[$attr] =  $value;
        return $this;
    }

    public function setClass($class){
        $this->attributes['class'] = $class;
        return $this;
    }

    public function setTextContent($text) {
        $this->content = $text;
        return $this; 
    }

    public function setElement($el){
        $this->elements[] = $el;
        return $this;
    }

    public function saveElements(){
        $elemString = '';
        foreach($this->elements as $element){
            if (is_object($element)) {
                $elemString .= $element->saveElements();
            }
        }

        $attrString = '';
        foreach($this->attributes as $name => $value){
            $attrString .= "$name=\"$value\"";
        }

        
        return "<{$this->tag} {$attrString}>{$this->content}{$elemString}</{$this->tag}>";
    }

}

class HTMLSection extends Tag {
    public function __construct() {
        parent::__construct('section');
    }

    public function setElement($el){
        $this->elements[] = $el;
        return $this;
    }

    public function saveElements(){
        $elemString = '';
        foreach($this->elements as $element){
         
            if (is_object($element)) {
                $elemString .= $element->saveElements();
            }
        }

        $attrString = '';
        foreach($this->attributes as $name => $value){
            $attrString .= "$name=\"$value\"";
        }

        return "<{$this->tag} {$attrString}>{$elemString}</{$this->tag}>";
    }

}

class HTMLAbbreviation extends Tag {
    public function __construct() {
        parent::__construct('abbr');
    }

    public function setTextContent($text) {
        $this->content = $text;
        return $this; 
    }

    public function setAttribute($attr, $value){
        $this->attributes[$attr] =  $value;
        return $this;
    }

    public function setElement($el){
        $this->elements[] = $el;
        return $this;
    }

    public function saveElements(){
        $elemString = '';
        foreach($this->elements as $element){
            if (is_object($element)) {
                $elemString .= $element->saveElements();
            }
        }

        $attrString = '';
        foreach($this->attributes as $name => $value){
            $attrString .= "$name=\"$value\"";
        }

    
        $textContent = isset($this->content) ? $this->content : '';
        return "<{$this->tag} {$attrString}>{$textContent}{$elemString}</{$this->tag}>";
    }
}

class HTMLCite extends Tag {
    public function __construct() {
        parent::__construct('cite');
    }
}

class HTMLCode extends Tag {
    public function __construct() {
        parent::__construct('code');
    }
}

class HTMLDefinition extends Tag {
    public function __construct() {
        parent::__construct('definition');
    }
}

class HTMLSample extends Tag {
    public function __construct() {
        parent::__construct('sample');
    }
}

class HTMLVariable extends Tag {
    public function __construct() {
        parent::__construct('variable');
    }
}

class HTMLArticle extends Tag {
    public function __construct() {
        parent::__construct('article');
    }
}

class HTMLAside extends Tag {
    public function __construct() {
        parent::__construct('aside');
    }

    public function setAttribute($attr, $value){
        $this->attributes[$attr] =  $value;
        return $this;
    }

    public function setClass($class){
        $this->attributes['class'] = $class;
        return $this;
    }

    public function setTextContent($text) {
        $this->content = $text;
        return $this; 
    }

    public function setElement($el){
        $this->elements[] = $el;
        return $this;
    }

    public function saveElements(){
        $elemString = '';
        foreach($this->elements as $element){
            if (is_object($element)) {
                $elemString .= $element->saveElements();
            }
        }

        $attrString = '';
        foreach($this->attributes as $name => $value){
            $attrString .= "$name=\"$value\"";
        }

        
        return "<{$this->tag} {$attrString}>{$this->content}{$elemString}</{$this->tag}>";
    }
}

class HTMLHeader extends Tag {
    public function __construct() {
        parent::__construct('header');
    }

    public function setAttribute($attr, $value){
        $this->attributes[$attr] =  $value;
        return $this;
    }

    public function setElement($el){
        $this->elements[] = $el;
        return $this;
    }


    public function saveElements(){
        $elemString = '';
        $attrString = '';
    
     
        foreach($this->elements as $element){
            $elemString .= $element->saveElements();
              
        }

        foreach($this->attributes as $name => $value){
            $attrString .= "$name=\"$value\"";
              
        }
        if(empty($attrString)){
            return "<{$this->tag} {$attrString}>{$elemString}</{$this->tag}>";  
    }
        else{

            $attrString = '';
                foreach($this->attributes as $name => $value){
                    $attrString .= "$name=\"$value\"";
                }

                return "<{$this->tag} {$attrString}>{$elemString}</{$this->tag}>";
        }
   
    }
}

class HTMLFooter extends Tag {
    public function __construct() {
        parent::__construct('footer');
    }

    public function setAttribute($attr, $value){
        $this->attributes[$attr] =  $value;
        return $this;
    }

    public function setClass($class){
        $this->attributes['class'] = $class;
        return $this;
    }

    public function setTextContent($text) {
        $this->content = $text;
        return $this; 
    }

    public function setElement($el){
        $this->elements[] = $el;
        return $this;
    }

    public function saveElements(){
        $elemString = '';
        foreach($this->elements as $element){
            if (is_object($element)) {
                $elemString .= $element->saveElements();
            }
        }

        $attrString = '';
        foreach($this->attributes as $name => $value){
            $attrString .= "$name=\"$value\"";
        }

        
        return "<{$this->tag} {$attrString}>{$this->content}{$elemString}</{$this->tag}>";
    }
}

class HTMLMain extends Tag {
    public function __construct() {
        parent::__construct('main');
    }
}

class HTMLNav extends Tag {
    public function __construct() {
        parent::__construct('nav');
    }

    public function setAttribute($attr, $value){
        $this->attributes[$attr] =  $value;
        return $this;
    }

    public function setClass($class){
        $this->attributes['class'] = $class;
        return $this;
    }

    public function setTextContent($text) {
        $this->content = $text;
        return $this; 
    }

    public function setElement($el){
        $this->elements[] = $el;
        return $this;
    }

    public function saveElements(){
        $elemString = '';
        foreach($this->elements as $element){
            if (is_object($element)) {
                $elemString .= $element->saveElements();
            }
        }

        $attrString = '';
        foreach($this->attributes as $name => $value){
            $attrString .= "$name=\"$value\"";
        }

        
        return "<{$this->tag} {$attrString}>{$this->content}{$elemString}</{$this->tag}>";
    }
}

class HTMLAddress extends Tag {
    public function __construct() {
        parent::__construct('address');
    }
}

class HTMLBlockQuote extends Tag {
    public function __construct() {
        parent::__construct('blockquote');
    }
}

class HTMLQuote extends Tag {
    public function __construct() {
        parent::__construct('quote');
    }
}

class HTMLStrongTag extends Tag {
    public function __construct() {
        parent::__construct('strong');
    }
}

class HTMLTextArea extends Tag {
    public function __construct() {
        parent::__construct('textarea');
    }
}
