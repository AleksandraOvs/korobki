<?php
$faq_items = carbon_get_post_meta(get_the_ID(), 'crb_faq');

if (!empty($faq_items)) : ?>
    <div class="container">
        <div class="faq-list">

            <?php foreach ($faq_items as $item) :
                $question = $item['crb_faq_question'];
                $answer   = $item['crb_faq_answer'];
            ?>

                <div class="faq-item">

                    <?php if ($question) : ?>
                        <h4 class="faq-question">
                            <?php echo esc_html($question); ?>
                        </h4>
                    <?php endif; ?>

                    <?php if ($answer) : ?>
                        <div class="faq-answer">
                            <div>
                                <?php echo apply_filters('the_content', $answer); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>

            <?php endforeach; ?>

        </div>
    </div>
<?php endif; ?>