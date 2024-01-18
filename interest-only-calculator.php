<?php
/*
 * Plugin Name:       Interest Only Calculator
 * Description:       
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Henri Susanto
 * Author URI:        https://github.com/susantohenri/
 * Text Domain:       interest-only-calculator
 */


// Add a shortcode for the Interest Only Calculator
function interest_only_calculator()
{
    ob_start();
    wp_enqueue_style('custom-styles', plugin_dir_url(__FILE__) . 'css/custom-styles.css', [], '1.0.1');
    echo "
        <div class=\"interestCalculator calx\">
            <div class=\"interestCalculatorForm\">
                <div class=\"oneLine\">
                    <label>Loan Amount (Principal)</label>
                    <div class=\"inputField\">
                        <input type=\"text\" class=\"basicInput\" id=\"field_2yof5\" name=\"item_meta[1]\" value=\"250000\" data-cell=\"D2\" data-format=\"$0,0.00\">
                    </div>
                </div>
                <div class=\"oneLine\">
                    <label>Annual Interest Rate</label>
                    <div class=\"inputField\">
                    <input class=\"basicInput\" type=\"text\" id=\"field_9f93w\" name=\"item_meta[2]\" value=\"4\" data-cell=\"D3\" data-format=\"0%\">
                    </div>
                </div>
                <div class=\"oneLine\">
                    <label>Loan Term (Years)</label>
                    <div class=\"inputField\">
                        <input class=\"basicInput\" type=\"text\" id=\"field_t2onv\" name=\"item_meta[3]\" value=\"30\" data-cell=\"D4\">
                    </div>
                </div>
                <div class=\"oneLine\">
                    <label>Interest-Only Period (Years)</label>
                    <div class=\"inputField\">
                        <input class=\"basicInput\" type=\"text\" id=\"field_d4ban\" name=\"item_meta[4]\" value=\"5\" data-cell=\"D5\">
                    </div>
                </div>
                <div class=\"oneLine selectbase\">
                    <label>Monthly Interest Payment</label>
                    <div class=\"inputField\">
                        <input class=\"basicInput\" type=\"text\" id=\"field_smwk0\" name=\"item_meta[6]\" value=\"\" data-cell=\"D6\" data-formula=\"D2* (D3) / 12\" data-format=\"$0,0.00\">
                    </div>
                </div>
                <div class=\"oneLine selectbase\">
                    <label>Total Interest Paid During Interest-Only Period</label>
                    <div class=\"inputField\">
                        <input class=\"basicInput\" type=\"text\" id=\"field_4314l\" name=\"item_meta[5]\" value=\"\" data-cell=\"D7\" data-formula=\"D6* 12 * D5\" data-format=\"0,0.00\">
                    </div>
                </div>
                <div class=\"oneLine selectbase\">
                    <label>Total Amount Paid at End of Term</label>
                    <div class=\"inputField\">
                        <input class=\"basicInput\" type=\"text\" id=\"field_55u5o\" name=\"item_meta[7]\" value=\"\" data-cell=\"D8\" data-formula=\"D2 + D7\" data-format=\"0,0.00\">
                    </div>
                </div>
                <div class=\"clear\"></div>
            </div>

            <p></p>
        </div>
    ";
    do_shortcode('[calx]');
    return ob_get_clean();
}
add_shortcode('interest-only-calculator', 'interest_only_calculator');
