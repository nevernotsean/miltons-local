<panel id="clients">
    <section class="waypoint">
      <div class="row collapse nomax">
            <div class="small-12 column">
              <?php $image = get_field('client_image');
              $img = $image['sizes']['large'];
              ?>
              <div class="left-image" style="background-image: url(<?php echo $img  ?>)">
                <img src="<?php echo $img  ?>" alt="">
              </div>
              <div class="sidebar">
                <div class="row">
                  <div class="small-12 column">
                    <h3 class="subhead"><small>Clients</small></h3>
                    <h1 class="headline"><?php echo get_field('client_title'); ?></h1>
                    <p><?php echo get_field('client_content'); ?></p>
                    <?php
                    $images = get_field('gallery');
                    if( $images ): ?>
                    <div class="row collapse">
                      <div class="small-12 column">
                        <ul class="small-block-grid-3 xlarge-block-grid-4">
                        <?php foreach( $images as $image ): ?>
                          <li>
                            <a href="<?php echo $image['description']; ?>">
                              <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
                            </a>
                          </li>
                        <?php endforeach; ?>
                        </ul>
                      </div>
                    </div>
                  <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </section>
  </panel>