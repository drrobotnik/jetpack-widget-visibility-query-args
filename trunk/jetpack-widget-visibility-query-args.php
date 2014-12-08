<?php /**
 * Plugin Name: Jetpack Widget Visibility Additional Fields - Query Args
 * Plugin URI: https://github.com/drrobotnik/jetpack-widget-visibility-query-args
 * Description: Add the ability to add query args to jetpacks visibility widget
 * Version: 1.0.0
 * Author: Brandon lavigne
 * Author URI: https://github.com/drrobotnik
 * License: GPL2
 */

function jetpack_widget_visibility_qa_js() { ?>
<script>
jQuery(function($) {
	$( document ).on( 'change.widgetconditions', 'select.conditions-rule-major', function() {
		var $conditionsRuleMajor = $ ( this );
		var $conditionsRuleMinor = $conditionsRuleMajor.siblings( 'select.conditions-rule-minor:first' );
		var $conditionsRuleQueryVars = $conditionsRuleMajor.siblings( 'input.conditions-rule-query-var' );

		if ( $conditionsRuleMajor.val() == 'query_vars' ) {
			$conditionsRuleMinor.hide();
			$conditionsRuleQueryVars.show();
		}else{
			$conditionsRuleMinor.show();
			$conditionsRuleQueryVars.hide();
			$conditionsRuleQueryVars.val("");
		}
	});
});

</script><?php
}

function jetpack_widget_visibility_qa_minor_visible( $default, $rule ) {
	
	if ( 'query_vars' == $rule['major'] ) {
		return false;
	}
	return true;
}

function jetpack_widget_visibility_qa_condition_major( $rule ) { ?>
<option value="query_vars" <?php selected( "query_vars", $rule['major'] ); ?>><?php esc_html_e( 'Query Vars', 'jetpack' ); ?></option>
<?php }

function jetpack_widget_visibility_qa_conditions( $conditions ) {
    return array( 'major' => '', 'minor' => '', 'query_var_key' => '', 'query_var_value' => '' );
}

function jetpack_widget_visibility_qa_additional_fields( $rule ) { 
	?><input class="conditions-rule-query-var small-text<?php if ( ! $rule['major'] || 'query_vars' != $rule['major'] ) { ?> hidden<?php } ?>" name="conditions[rules_query_var_key][]" value="<?php echo $rule['query_var_key']; ?>" data-brandon="" placeholder="key" />
	<input class="conditions-rule-query-var small-text<?php if ( ! $rule['major'] || 'query_vars' != $rule['major'] ) { ?> hidden<?php } ?>" name="conditions[rules_query_var_value][]" value="<?php echo $rule['query_var_value']; ?>" data-brandon="" placeholder="value" /><?php 
}

function jetpack_widget_visibility_qa_conditions_defaults( $defaults, $index ) {
	$defaults['query_var_key'] = isset( $_POST['conditions']['rules_query_var_key'][$index] ) ? $_POST['conditions']['rules_query_var_key'][$index] : '';
	$defaults['query_var_value'] = isset( $_POST['conditions']['rules_query_var_value'][$index] ) ? $_POST['conditions']['rules_query_var_value'][$index] : '';
	return $defaults;
}


function jetpack_widget_visibility_qa_filter_widget( $condition_result, $rule ) {

	if( 'query_vars' == $rule['major']) {
		if( ICL_LANGUAGE_CODE == $rule['query_var_value'] ) {
			$condition_result = true;
		} else {
			$condition_result = false;
		}

	}

	return $condition_result;
}

function jetpack_widget_visibility_qa_init() {
	global $pagenow;
	if( 'widgets.php' == $pagenow) {
		add_action( 'admin_head', 'jetpack_widget_visibility_qa_js',100);
	}
}


add_filter( 'widget_conditions_defaults', 'jetpack_widget_visibility_qa_conditions_defaults', 10, 2 );
add_filter( 'widget_visibility_conditions', 'jetpack_widget_visibility_qa_conditions' );
add_filter( 'widget_visibility_minor_visible', 'jetpack_widget_visibility_qa_minor_visible', 10, 2 );
add_filter( 'widget_visibility_filter_widget', 'jetpack_widget_visibility_qa_filter_widget', 10, 2 );

add_action('admin_init','jetpack_widget_visibility_qa_init');
add_action( 'widget_visibility_condition_major', 'jetpack_widget_visibility_qa_condition_major' );
add_action( "widget_visibility_additional_fields", 'jetpack_widget_visibility_qa_additional_fields' );