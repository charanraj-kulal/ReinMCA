<?php
 $groupname = "";
 $noclose = true;
 $page_url = null;
 $pages_list = $this->Shared_ml->getMenuPages();
 $menus_items = array();
?>

<?php
    
        if($pages_list){
           
           // GROUP BY MENU ITEMS
            foreach($pages_list as $menu){
                if(!isset($menus_items[$menu->page_group]))
                $menus_items[$menu->page_group] = array();
                $page_url = $menu->page_url;
                $page_url=str_replace('-','_',$page_url);
                $page_url = explode('/',$page_url);
                if(count($page_url)>1){
                    $page_url = $page_url[0].'/'.$page_url[1];
                }else {
                    $page_url = $page_url[0];
                }
                array_push($menus_items[$menu->page_group],strtolower($page_url));
            }
            // END GROUP BY MENU ITEMS
           
           
            foreach ($pages_list as $item)
            {
              
             
                $page_url = explode('/',$item->page_url);
                if(count($page_url)==3){
                        $page_url[2] = str_replace('-','_',$page_url[2]);
                        $page_url= $page_url[1].'/'.strtolower($page_url[2]);
                }else{
                        $page_url = implode('/',$page_url);
                }
                $page_real_url = explode('/',$item->page_url);
                if ($item->page_group == $item->page_name)
                {
                    if ($groupname != "" && $noclose == true)
                    {
                        ?>
                        </ul></li>
                        <?php 
                    }
                    ?>
                    <!-- StandAlone Menu -->
                    <li class="<?=menu_class($page_url)?> pc-item " data-d="<?=$page_url?>"><a href="<?=site_url($item->page_url)?>" class="pc-link "><span class="pc-micon"><i data-feather="<?=$item->page_group_icon?>"></i></span> <span class="nav-label"><?=$item->page_group?></span> </a></li>
                    <?php
                    $noclose = false;
                }
                else
                {
                    if ($groupname == "" || $groupname != $item->page_group)
                    {
                        if ($groupname != "" && $noclose == true)
                        {
                            ?>
                        </ul></li>
                        <?php 
                        }
                        ?>
                        <!-- Group based menu -->
                        <li class="pc-item <?=navigation_parent_active($menus_items[$item->page_group])?>"><a href="javascript:;" class="pc-link "><span class="pc-micon"><i data-feather="<?=$item->page_group_icon?>"></i></span> <span><?=$item->page_group?></span> <span class="pull-right-container">
                   
                                    <span class="pc-arrow"><i data-feather="chevron-right"></i></span>

                            </span></a>
                        <ul class="pc-submenu">
                        <?php
                        
                    }
                    
                    ?>
                    <!-- Group based items -->
                    <li class=" pc-item <?=menu_class($page_url)?>" data-d="<?=$page_url?>"><a href="<?=site_url($item->page_url)?>" class="pc-link"><?=$item->page_name?></a></li>
                    <?php
                    $noclose = true;
                }
                $groupname = $item->page_group;
            }
            if($noclose)
            echo "</ul></li>";
            
    }
?>