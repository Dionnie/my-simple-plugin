<div class="wrap ">
    <h1 class="plugin-title">My Simple Plugin Settings</h1>



    <form id="preview-form" method="post" action="options.php">
        <?php settings_fields('my-simple-plugin-settings-group'); ?>
        <?php do_settings_sections('my-simple-plugin-settings-group'); ?>

        <div class="grid-container">
            <div class="grid-item">
                <div style="display:flex;flex-direction: column; gap: 10px; ">


                    <b style="font-size: 16px;">Custom CSS</b>



                    <textarea class="cm-s-one-dark" id="custom-css" name="custom-css"><?= esc_textarea(get_option('custom-css')) ?></textarea>



                </div>
            </div>
            <div class="grid-item">
                <div style="display:flex;flex-direction: column; gap: 10px; ">

                    <b style="font-size: 16px;">Custom JS</b>

                    <textarea class="cm-s-one-dark" id="custom-js" name="custom-js"><?= esc_textarea(get_option('custom-js')) ?></textarea>

                </div>
            </div>
        </div>



        <?php submit_button(); ?>

    </form>
</div>