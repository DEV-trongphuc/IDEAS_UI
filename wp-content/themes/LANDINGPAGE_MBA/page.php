<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!-- Premium Hero Header -->
<section class="premium-page-hero">
    <div class="premium-page-hero-overlay"></div>
    <div class="premium-page-hero-container">
        <nav class="premium-page-breadcrumbs">
            <a href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a> / <span><?php the_title(); ?></span>
        </nav>
        <h1 class="premium-page-title"><?php the_title(); ?></h1>
    </div>
</section>

<!-- Content Container -->
<div class="premium-page-content-wrapper">
    <article id="post-<?php the_ID(); ?>" <?php post_class('premium-page-card'); ?>>
        <div class="entry-content" itemprop="mainContentOfPage">
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="premium-page-featured-img">
                    <?php the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) ); ?>
                </div>
            <?php endif; ?>
            
            <div class="premium-page-body">
                <?php the_content(); ?>
            </div>
            
            <div class="entry-links"><?php wp_link_pages(); ?></div>
        </div>
    </article>
</div>

<?php endwhile; endif; ?>

<style>
    /* ─── PREMIUM PAGE STYLING ─── */
    .premium-page-hero {
        position: relative;
        background-color: #080c14;
        background-image: 
            radial-gradient(circle at 10% 20%, rgba(185, 14, 0, 0.12) 0%, transparent 45%),
            radial-gradient(circle at 90% 70%, rgba(185, 14, 0, 0.08) 0%, transparent 45%);
        padding: 150px 20px 100px;
        text-align: center;
        overflow: hidden;
    }
    
    .premium-page-hero-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(8, 12, 20, 0.6) 0%, #080c14 100%);
        z-index: 1;
    }

    .premium-page-hero-container {
        position: relative;
        z-index: 2;
        max-width: 900px;
        margin: 0 auto;
    }

    .premium-page-breadcrumbs {
        font-size: 0.85rem;
        color: rgba(255, 255, 255, 0.6);
        margin-bottom: 16px;
        font-weight: 500;
        letter-spacing: 0.03em;
        text-transform: uppercase;
    }

    .premium-page-breadcrumbs a {
        color: rgba(255, 255, 255, 0.6);
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .premium-page-breadcrumbs a:hover {
        color: #ff3b30;
    }

    .premium-page-breadcrumbs span {
        color: #ff3b30;
    }

    .premium-page-title {
        font-size: clamp(2rem, 4.5vw, 2.6rem);
        font-weight: 800;
        color: #ffffff !important;
        line-height: 1.25;
        margin: 0;
        text-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
    }

    /* ─── CONTENT CARD ─── */
    .premium-page-content-wrapper {
        position: relative;
        z-index: 5;
        max-width: 960px;
        margin: -40px auto 80px;
        padding: 0 20px;
    }

    .premium-page-card {
        background: #ffffff;
        border-radius: 24px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 15px 35px rgba(15, 23, 42, 0.05);
        overflow: hidden;
    }

    .premium-page-featured-img img {
        width: 100%;
        height: auto;
        max-height: 400px;
        object-fit: cover;
        display: block;
    }

    .premium-page-body {
        padding: 50px 60px;
    }

    @media (max-width: 768px) {
        .premium-page-hero {
            padding: 120px 16px 70px;
        }
        .premium-page-content-wrapper {
            margin-top: -30px;
            margin-bottom: 50px;
        }
        .premium-page-body {
            padding: 30px 24px;
        }
    }

    /* ─── TYPOGRAPHY INSIDE CONTENT ─── */
    .premium-page-body p {
        font-size: 1.05rem;
        line-height: 1.75;
        color: #334155;
        margin-bottom: 24px;
    }

    .premium-page-body p:last-child {
        margin-bottom: 0;
    }

    .premium-page-body h2 {
        font-size: 1.5rem;
        font-weight: 700;
        color: #0f172a !important;
        margin: 45px 0 20px;
        padding-left: 14px;
        border-left: 4px solid #ab0e00;
        line-height: 1.35;
    }

    .premium-page-body h3 {
        font-size: 1.25rem;
        font-weight: 600;
        color: #0f172a !important;
        margin: 35px 0 16px;
        line-height: 1.4;
    }

    .premium-page-body ul, 
    .premium-page-body ol {
        padding-left: 24px;
        margin-bottom: 24px;
        color: #334155;
    }

    .premium-page-body li {
        font-size: 1.02rem;
        line-height: 1.7;
        margin-bottom: 10px;
    }

    .premium-page-body a {
        color: #ab0e00;
        text-decoration: underline;
        font-weight: 600;
        transition: color 0.2s ease;
    }

    .premium-page-body a:hover {
        color: #ff3b30;
    }

    .premium-page-body strong {
        color: #0f172a;
    }

    .premium-page-body blockquote {
        margin: 30px 0;
        padding: 20px 30px;
        border-left: 4px solid #ab0e00;
        background: #f8fafc;
        border-radius: 0 16px 16px 0;
    }

    .premium-page-body blockquote p {
        font-style: italic;
        font-size: 1.1rem;
        margin-bottom: 0;
    }
</style>

<?php get_footer(); ?>