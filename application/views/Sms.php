<html>
    <head>
        <title><?php echo $page_title; ?></title>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>media/reset.css"/>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>media/style.css"/>
        
    </head>
    <body>


        <div id="form-container">
            <h1>Send SMS</h1>
            <?php echo $this->session->flashdata('error'); ?>
            <?php echo $this->session->flashdata('success'); ?>
            <?php
            $phone = array(
                'name' => 'phone',
                'placeholder' => 'e.g. 08123456789'
            );
            $text = array(
                'name' => 'text',
                'placeholder' => 'Type your message here',
                'id' => 'body'
            );
            $submit = array(
                'value' => 'SEND',
                'class' => 'send-button'
            );
            ?>
            <?php echo form_open(base_url() . 'sms/validate'); ?>
            <table>
                <tr>
                    <td>To</td>
                    <td><?php echo form_input($phone); ?></td>
                </tr>
                <tr>
                    <td>Message</td>
                    <td>
                        <?php echo form_textarea($text); ?>
                        <div id="cleft">
                            <span id="charsleft"></span> characters left.
                        </div>
                    </td>
                </tr>
            </table>
            <?php echo form_submit($submit); ?>
            <?php echo form_close(); ?>
        </div>
        <script>
            $('#body').limit('160','#charsleft');
        </script>
    </body>
</html>
