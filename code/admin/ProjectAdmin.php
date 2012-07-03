<?php
/**
 * FinanceAdmin manages financial data, such as Expenses and Purchases
 *
 * @author morven
 */
class ProjectAdmin extends ModelAdmin {
    public static $managed_models = array('Milestone','Project','ProjectCategory','Task');
    
    public static $url_segment = 'projects';
    
    public static $menu_title = 'Projects'; 
    
    public static $menu_priority = 10;
}