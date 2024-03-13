<?php
function consulta_fipe_register_widget() {
    register_widget('Consulta_FIPE_Widget');
    add_action('wp_enqueue_scripts', 'consulta_fipe_enqueue_scripts');
}
add_action('widgets_init', 'consulta_fipe_register_widget');


function consulta_fipe_enqueue_scripts() {
    wp_enqueue_script('consulta_fipe_script', plugin_dir_url(__FILE__) . 'js/consulta_fipe.js', array('jquery'), '1.0', true);
}


class Consulta_FIPE_Widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'consulta_fipe_widget',
            __('Consulta FIPE', 'consulta_fipe'),
            array('description' => __('Consulta a tabela FIPE para obter informações sobre carros, motos e caminhões.', 'consulta_fipe'))
        );
    }

   
    public function widget($args, $instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('Consulta FIPE', 'consulta_fipe');
        echo $args['before_widget'];
        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
        ?>
        <form id="consulta_fipe_form">
            <div class="form-group">
                <label for="tipo_veiculo"><?php _e('Tipo de Veículo:', 'consulta_fipe'); ?></label>
                <select id="tipo_veiculo" class="form-control">
                    <option value="carro"><?php _e('Carro', 'consulta_fipe'); ?></option>
                    <option value="moto"><?php _e('Moto', 'consulta_fipe'); ?></option>
                    <option value="caminhao"><?php _e('Caminhão', 'consulta_fipe'); ?></option>
                </select>
            </div>
            <div class="form-group">
                <label for="marca"><?php _e('Marca:', 'consulta_fipe'); ?></label>
                <select id="marca" class="form-control"></select>
            </div>
            <div class="form-group">
                <label for="modelo"><?php _e('Modelo:', 'consulta_fipe'); ?></label>
                <select id="modelo" class="form-control"></select>
            </div>
            <div class="form-group">
                <label for="ano"><?php _e('Ano:', 'consulta_fipe'); ?></label>
                <select id="ano" class="form-control"></select>
            </div>
            <div id="consulta_fipe_result"></div>
        </form>
        <?php
        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('Consulta FIPE', 'consulta_fipe');
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'consulta_fipe'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <?php
    }

    
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}
