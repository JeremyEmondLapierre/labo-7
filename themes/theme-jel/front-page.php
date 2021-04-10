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
			$chaine_bouton_radio = '';
			/* Liste des carrés de cours */
			while ( have_posts() ) :
				the_post();
                convertirTableau($tPropriété);

				if($tPropriété['typeCours'] !=  $precedent): 
					if("XXXXXX" != $precedent) :?>
					</section>
					<?php  if (in_array($precedent, ['Web', 'Jeu', 'Spécifique'])) : ?>
						<section class="ctrl-carroussel">
					<?php echo $chaine_bouton_radio;
						  $chaine_bouton_radio = '';
					?>
					</section>
					<?php endif; ?>
					<?php endif; ?>
					<div class="TypeCours">
					<div class="bar"></div>
					<h2><?php echo $tPropriété['typeCours'] ?></h2>
					<div class="bar"></div>
					</div>
					<section <?php echo(in_array($tPropriété['typeCours'], ['Web', 'Jeu', 'Spécifique']) ? 'class ="carrouselCours"' : ''); ?> >
					
				<?php endif ?>
				<?php if(in_array($tPropriété['typeCours'], ['Web', 'Jeu', 'Spécifique']) ) : 
					get_template_part('template-parts/content', 'cours-slider');
					$chaine_bouton_radio .= '<input class="rad-carrousel" type="radio" name="rad-'.$tPropriété['typeCours'].'">';
				else :
					get_template_part('template-parts/content', 'cours-article');  
				endif;             
				$precedent = $tPropriété['typeCours'];
				endwhile; 
				?>
			</section> <!-- Fin section cours -->
			
		<?php endif; ?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();

function convertirTableau(&$tPropriété)
{
	// $titre = get_the_title();
	// //582-1w1 Mise en page Web(75h)
	// $sigle = substr($titre, 0, 7);
	// $nbHeure = substr($titre, -4,3);
	// $titrePartiel = substr($titre, 8, -6);
    // $session = substr($titre, 4, 1);
    // //$contenu = get_the_content();
    // //$resume = substr($contenu, 0, 200);
	// $typeCours = get_field('type_de_cours');

	$tPropriété['titre'] = get_the_title();
	$tPropriété['sigle'] = substr($tPropriété['titre'], 0, 7);
	$tPropriété['nbHeure'] = substr($tPropriété['titre'], -4,3);
	$tPropriété['titrePartiel'] = substr($tPropriété['titre'], 8, -6);
	$tPropriété['session'] = substr($tPropriété['titre'], 4, 1);
	$tPropriété['typeCours'] = get_field('type_de_cours');
}