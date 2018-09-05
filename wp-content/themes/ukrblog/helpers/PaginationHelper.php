<?php

class PaginationHelper
{
    protected $post_per_page;
    protected $total_posts;
    protected $current_page;
    protected $total_pages;

    public function __construct($post_per_page,$total_posts,$current_page)
    {
        $this->post_per_page = $post_per_page;
        $this->total_posts = $total_posts;
        $this->current_page = $current_page;
        $this->total_pages = ceil($total_posts/$post_per_page);
    }

    public function get_pagination()
    {
        if($this->total_pages < 2){
            return false;
        }
        $to_first = ($this->current_page>3) ? '<li><a href="/?list=1"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>' : '';
        $to_prev = ($this->current_page>1) ? '<li><a href="/?list='.($this->current_page-1).'"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>' : '';
        $to_page_back_2 = ($this->current_page>2) ? '<li><a href="/?list='.($this->current_page-2).'">'.($this->current_page-2).'</a></li>' : '';
        $to_page_back_1 = ($this->current_page>1) ? '<li><a href="/?list='.($this->current_page-1).'">'.($this->current_page-1).'</a></li>' : '';
        $to_current = '<li><span>'.$this->current_page.'</span></li>';
        $to_page_next_1 = (($this->total_pages-$this->current_page)>0) ? '<li><a href="/?list='.($this->current_page+1).'">'.($this->current_page+1).'</a></li>' : '';
        $to_page_next_2 = (($this->total_pages-$this->current_page)>1) ? '<li><a href="/?list='.($this->current_page+2).'">'.($this->current_page+2).'</a></li>' : '';
        $to_next = (($this->total_pages-$this->current_page)>0) ? '<li><a href="/?list='.($this->current_page+1).'"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>' : '';
        $to_last_page = (($this->total_pages-$this->current_page)>2) ? '<li><a href="/?list='.$this->total_pages.'"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>' : '';
        $html = <<<HDS
            <div class="ub-pagination">
                <div class="inner">
                    <ul>
                        {$to_first}
                        {$to_prev}
                        {$to_page_back_2}
                        {$to_page_back_1}
                        {$to_current}
                        {$to_page_next_1}
                        {$to_page_next_2}
                        {$to_next}
                        {$to_last_page}
                    </ul>
                </div>
            </div>
HDS;
        return $html;
    }
}