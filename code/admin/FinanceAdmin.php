<?php
/**
 * FinanceAdmin manages financial data, such as Expenses and Purchases
 *
 * @author morven
 */
class FinanceAdmin extends ModelAdmin {
    public static $managed_models = array('Expense','Purchase');
    
    public static $url_segment = 'finances';
    
    public static $menu_title = 'Finances'; 
    
    public static $menu_priority = 10;
}