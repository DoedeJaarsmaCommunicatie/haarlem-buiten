<?php
namespace App\Providers;
use PostTypes\PostType;
use PostTypes\Taxonomy;

class PostTypeServiceProvider
{
    public function __construct()
    {
        $this->register();
    }

    private function register()
    {
        $bouwnummer = new PostType('bouwnummer');
        $bouwnummer->icon('dashicons-admin-multisite');
        $bouwnummer->options([
            'rewrite'   => [
                'slug'  => 'bouwnummer'
            ],
	        'supports' => [
	        	'title',
		        'editor',
		        'thumbnail'
	        ]
        ]);
        $bouwnummer->taxonomy('type');
        $bouwnummer->register();

        $loc = new Taxonomy('type');
        $loc->options([
            'hierarchical'  => true
        ]);

        $loc->register();

        $this->addCustomColumnsToPlot();
    }

    private function addCustomColumnsToPlot()
    {
    	if (!is_admin()) {
    		return;
	    }
    	add_filter('manage_bouwnummer_posts_columns', static function ($columns) {
    		$columns ['selling_price'] = 'Prijs';

    		return $columns;
	    });

    	add_action('manage_bouwnummer_posts_custom_column', static function ($columns, $post_id) {
			if ($columns === 'selling_price') {
				printf(
					'&euro; %s',
					carbon_get_post_meta($post_id, 'price')
				);
			}
	    }, 10, 2);

    	add_action('quick_edit_custom_box', static function ($column_name, $post_type){
    		global $post;
    		if ($post_type !== 'bouwnummer' || $column_name !== 'selling_price') {
    			return;
		    }

			$price = carbon_get_post_meta($post->ID, 'price');

    		?>
		    <fieldset class="inline-edit-col-right">
			    <div class="inline-edit-col">
				    <label>
					    <span class="title"><?php esc_html_e( 'Prijs', 'hb' ); ?></span>
					    <span class="input-text-wrap">
                            <input type="text" name="selling_price" class="selling_price_field" value="<?= $price ?>">
                        </span>
				    </label>
			    </div>
		    </fieldset>
			<?php
	    }, 10, 2);

    	add_action('save_post', static function ($post_id, $post) {
    		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    			return;
		    }

    		if ($post->post_type !== 'bouwnummer') {
    			return;
		    }

    		if (!current_user_can('edit_post', $post_id)) {
    			return;
		    }

    		if (isset($_POST['selling_price'])) {
    			$newprice = $_POST['selling_price'];

    			carbon_set_post_meta($post_id, 'price', $newprice);
		    }
	    }, 10, 2);

    	add_action('admin_print_footer_scripts-edit.php', static function () {
    		$current_screen = get_current_screen();

    		if ($current_screen->post_type !== 'bouwnummer') {
    			return;
		    }

    		wp_enqueue_script('jquery');
    		?>
		    <script>
			    jQuery(function($) {
			    	$('#the-list').on('click', 'a.editinline', function (e) {
			    		e.preventDefault();
			    		const price = $(this).data('edit-price');
			    		inlineEditPost.revert();
			    		$('.selling_price_field').val(price? price : '');
				    });
			    })
		    </script>

		    <?php
	    });

    	add_filter('post_row_actions', static function ($actions, $post) {
    		$found_val = carbon_get_post_meta($post->ID, 'price');

    		if ($found_val) {
    			if (isset($actions['inline hide-if-no-js'])) {
    				$new_attribute = sprintf('data-edit-price="%s"', esc_attr($found_val));
				    $actions['inline hide-if-no-js'] = str_replace( 'class=', "$new_attribute class=", $actions['inline hide-if-no-js'] );
    			}
		    }

    		return $actions;
	    }, 10, 2);
    }

}
