<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme-jel
 */

get_header();
?>
	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<section class="cours">
			<?php
			/* Start the Loop */
            $precedent = "XXXXXX";
			/* Liste des carrés de cours */
			while ( have_posts() ) :
				the_post();
                $titre = get_the_title();
				//582-1w1 Mise en page Web(75h)
				$sigle = substr($titre, 0, 7);
				$nbHeure = substr($titre, -4,3);
				$titrePartiel = substr($titre, 8, -6);
                $session = substr($titre, 4, 1);
                //$contenu = get_the_content();
                //$resume = substr($contenu, 0, 200);
				$typeCours = get_field('type_de_cours');

				if($typeCours !=  $precedent): 
					if("XXXXXX" != $precedent) :?>
					</section>
					<?php endif ?>
					<div class="TypeCours">
					<div class="bar"></div>
					<h2><?php echo $typeCours ?></h2>
					<div class="bar"></div>
					</div>
					<section>
					
				<?php endif ?>
				
				<article>
					<p><?php echo $sigle . " - ". $typeCours . " - " . $nbHeure; ?></p>
					<a href="<?php echo get_permalink() ?>"><?php echo $titrePartiel; ?></a>
					<p>Session : <?php echo $session; ?></p>
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#000b76" fill-opacity="1" d="M0,96L12,122.7C24,149,48,203,72,234.7C96,267,120,277,144,250.7C168,224,192,160,216,128C240,96,264,96,288,106.7C312,117,336,139,360,138.7C384,139,408,117,432,112C456,107,480,117,504,106.7C528,96,552,64,576,74.7C600,85,624,139,648,144C672,149,696,107,720,117.3C744,128,768,192,792,218.7C816,245,840,235,864,218.7C888,203,912,181,936,176C960,171,984,181,1008,160C1032,139,1056,85,1080,74.7C1104,64,1128,96,1152,133.3C1176,171,1200,213,1224,240C1248,267,1272,277,1296,277.3C1320,277,1344,267,1368,218.7C1392,171,1416,85,1428,42.7L1440,0L1440,320L1428,320C1416,320,1392,320,1368,320C1344,320,1320,320,1296,320C1272,320,1248,320,1224,320C1200,320,1176,320,1152,320C1128,320,1104,320,1080,320C1056,320,1032,320,1008,320C984,320,960,320,936,320C912,320,888,320,864,320C840,320,816,320,792,320C768,320,744,320,720,320C696,320,672,320,648,320C624,320,600,320,576,320C552,320,528,320,504,320C480,320,456,320,432,320C408,320,384,320,360,320C336,320,312,320,288,320C264,320,240,320,216,320C192,320,168,320,144,320C120,320,96,320,72,320C48,320,24,320,12,320L0,320Z"></path></svg>
				</article>                
        <?php
		$precedent = $typeCours;
		endwhile; 
		?>
			</section> <!-- Fin section cours -->
		<?php endif; ?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
