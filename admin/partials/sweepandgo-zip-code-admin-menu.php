<?php
$sng_form_slugs = maybe_unserialize(get_option('sng_form_slugs'));
$sng_form_stylings = maybe_unserialize(get_option('sng_form_styling'));
?>
<div class='sng-wrap'>
    <div class="sng-logo">
        <img class="sng-area-logo" src="<?php echo plugin_dir_url(dirname(__FILE__)) . 'img/sag-service-area-checker.png' ?>">
        <img class="sng-powered" src="<?php echo plugin_dir_url(dirname(__FILE__)) . 'img/powered-by-sag.png' ?>">
    </div>
    <div id="sng-tabs" class="sng-tabs">
        <ul class="sng-ul-tabs">
            <li><a href="#general-tab">General</a></li>
            <li><a href="#styling-tab">Styling</a></li>
        </ul>
    <div class="sng-body">
        <div id="general-tab">
            <div class="sng-display">
                <form method="post" action="<?php echo admin_url('admin-post.php'); ?>">
                    <?php
                    $messages = array(
                        '1' => ['content' =>'Success!', 'class' => 'success'],
                        '2' => ['content' => 'It appears that your link is wrong, please try again', 'class' => 'error']
                    );

                    $msg_id = isset($_GET['msg']) ? esc_attr(($_GET['msg'])) : 0;
                    if (array_key_exists($msg_id, $messages)) {
                        echo "<div id='sng-form-message' class='" . esc_attr($messages[$msg_id]['class']) ."'><span class='dashicons dashicons-yes-alt' style='margin-right: 1rem; font-size: 24px;'></span><p style='display: inline; font-size: 14px;'>" . esc_attr($messages[$msg_id]['content']) . "</p><span class='dashicons dashicons-no sng-message-close' onclick='hideMessage()'></span></div>";
                    }
                    ?>

                    <div class="sng-form">
                        <label for="sng-slug" class="sng-slug-label"><strong>Client Onboarding Form Slug:</strong> </label>
                        <div class="sng-slug-input">
                            <input class="link-input" type="text" name="sng_form_slug" placeholder="this-is-slug" aria-describedby="emailHelp">
                            <span class="input-help">https://client.sweepandgo.com/<strong>this-is-slug</strong>/register</span>
                        </div>
                        <input type="hidden" name="action" value="save_zip_code_settings">
                        <?php
                        submit_button('Add Slug', 'sng-submit-button');
                        ?>
                    </div>
                </form>
                <div class="sng-forms">
                    <table class="sng-table">
                        <tr class="sng-tr">
                            <th class="sng-th">Onboarding form slug</th>
                            <th class="sng-th action">Actions</th>
                        </tr>
                        <?php if(empty($sng_form_slugs)): ?>
                            <tr class="sng-td">
                                <td class="sng-td">No Data Available</td>
                            </tr>
                        <?php endif; ?>
                        <?php foreach ($sng_form_slugs as $slug) : ?>
                            <tr class="sng-td">
                                <td class="sng-td"><a href="https://client.sweepandgo.com/<?php echo $slug; ?>/register"><?php echo $slug; ?></a></td>
                                <td class="sng-td action">
                                    <a class="sng-a" href='<?php echo admin_url("admin-post.php?action=delete_form&sng_form_slug[]=$slug"); ?>'>Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <div class="shortcode-info">
                    <div class="shortcode-sng">
                        <h2>How to use</h2>
                        <ul>
                            <li>Find your Client Onboarding registration link <a href="https://employee.sweepandgo.com/client_onboarding">here</a> (Click button "View in a browser" to get to the registration link)</li>
                            <li>Copy the slug from the form URL (https://client.sweepandgo.com/<strong>this-is-slug</strong>/register)</li>
                            <li>Paste the slug into Sweep&Go Service Area Checked WordPress plugin using the form above</li>
                        </ul>
                    </div>
                    <div class="shortcode-usage">
                        <h2>Shotcode Usage</h2>
                        <p class="short-codes">
                            Type the <strong>[sng-zip-code-form]</strong> shortcode on the page you want zip code form to be shown.
                        </p>
                        <p><strong>Attributes:</strong><small>(Advanced usage for developers)</small></p>
                        <ul class="short-codes-attr">
                            <li>
                                <strong>form_class</strong> - Wrap the Form With CSS Class
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="styling-tab">
            <div class="sng-display">
            <form method="post" action="<?php echo admin_url('admin-post.php'); ?>">
                    <div class="sng-form-style">
                        <div class="form-control">
                            <label for="sng_button_color">Button color: </label>
                            <input type="text" class="basic" id="sng_button_color" value="<?php echo (isset($sng_form_stylings['button_color']))? esc_textarea($sng_form_stylings['button_color']):'#00acc1'; ?>" name="button_color"> 
                        </div>
                        <div class="form-control">
                            <label for="sng_button_text_color">Button Text color: </label>
                            <input type="text" class="basic" id="sng_button_text_color" value="<?php echo (isset($sng_form_stylings['button_text_color']))? esc_textarea($sng_form_stylings['button_text_color']):'#ffffff'; ?>" name="button_text_color">
                        </div>
                        <div class="form-control">
                            <label for="sng_button_text">Button text: </label>
                            <input type="text" id="sng_button_text" value="<?php echo (isset($sng_form_stylings['button_text']))? esc_textarea($sng_form_stylings['button_text']): 'Free quote'; ?>" name="button_text">
                        </div>
                        <div class="form-control">
                            <label for="sng_button_placeholder_text">Input field Placeholder text: </label>
                            <input type="text" id="sng_button_placeholder_text" value="<?php echo (isset($sng_form_stylings['text_placeholder']))? esc_textarea($sng_form_stylings['text_placeholder']): 'Enter Zip Code'; ?>" name="text_placeholder">
                        </div>
                        <input type="hidden" name="action" value="save_zip_code_style_settings">
                        <?php
                        submit_button('Save Changes', 'sng-submit-button');
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>

<script type="text/javascript">
    function delete_form(form_id) {
        console.log(`delete ${form_id}`)
    }

    function hideMessage() {
        document.getElementById("sng-form-message").style.display = 'none'
    }

    jQuery(function() {
        jQuery("#sng-tabs").tabs();
    });

    jQuery(".basic").spectrum({
        preferredFormat: 'hex',
    });
</script>
<style>
    #dup-global-error-reserved-files,
    .update-nag {
        display: none;
    }

    #wpcontent {
        padding: 0;
    }

    @media (max-width: 768px) {
        .auto-fold #wpcontent {
            padding: 0;
        }
    }

    p.submit {
        padding: 0;
    }
</style>