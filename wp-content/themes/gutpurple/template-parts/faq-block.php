<?php
$faq_items = carbon_get_post_meta(get_the_ID(), 'crb_faq');

if (!empty($faq_items)) : ?>
    <div class="container">
        <div class="faq-list">

            <?php foreach ($faq_items as $item) :
                $question = $item['crb_faq_question'];
                $answer   = $item['crb_faq_answer'];
            ?>

                <div class="faq-item wp-block-column faq-item is-layout-flow wp-block-column-is-layout-flow">

                    <?php if ($question) : ?>
                        <h4 class="faq-question wp-block-heading">
                            <?php echo esc_html($question); ?>
                        </h4>
                    <?php endif; ?>

                    <?php if ($answer) : ?>
                        <div class="faq-answer wp-block-columns is-layout-flex wp-container-core-columns-is-layout-9d6595d7 wp-block-columns-is-layout-flex">
                            <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow">
                                <?php echo apply_filters('the_content', $answer); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>

            <?php endforeach; ?>

        </div>
    </div>
<?php endif; ?>