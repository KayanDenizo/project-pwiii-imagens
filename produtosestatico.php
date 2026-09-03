<?php
// Catálogo estático: dados fixos no código, sem consulta ao banco de dados.
// As imagens ficam na pasta banco_imagem/.
$produtos = [
    ['nome' => 'Sofá Confort 3 Lugares', 'categoria' => 'Sala de Estar', 'cat_slug' => 'sala', 'preco' => 2399.90, 'img' => 'sofa-confort.jpg', 'desc' => 'Estofado em veludo macio, estrutura reforçada e muito conforto para a sala de estar.'],
    ['nome' => 'Sofá Retrátil e Reclinável', 'categoria' => 'Sala de Estar', 'cat_slug' => 'sala', 'preco' => 3199.00, 'img' => 'sofa-retratil.jpg', 'desc' => 'Assentos retráteis e reclináveis com apoio de pés, perfeito para relaxar após um dia cheio.'],
    ['nome' => 'Calça Jeans Slim Fit', 'categoria' => 'Vestuário', 'cat_slug' => 'vestuario', 'preco' => 159.90, 'img' => 'calca-slim.jpg', 'desc' => 'Modelagem slim, tecido resistente e confortável para o dia a dia.'],
    ['nome' => 'Calça Jeans Reta Premium', 'categoria' => 'Vestuário', 'cat_slug' => 'vestuario', 'preco' => 189.90, 'img' => 'calca-reta.jpg', 'desc' => 'Corte reto, acabamento premium e caimento perfeito em qualquer ocasião.'],
    ['nome' => 'Calça Cargo Jeans', 'categoria' => 'Vestuário', 'cat_slug' => 'vestuario', 'preco' => 209.90, 'img' => 'calca-cargo.jpg', 'desc' => 'Bolsos utilitários e visual urbano, ideal para o uso casual.'],
    ['nome' => 'Smartphone Galaxy Pro', 'categoria' => 'Eletrônicos', 'cat_slug' => 'eletronicos', 'preco' => 2899.00, 'img' => 'smartphone-pro.jpg', 'desc' => 'Câmera de alta resolução e desempenho de ponta para o seu dia a dia.'],
    ['nome' => 'Smartphone Ultra 5G', 'categoria' => 'Eletrônicos', 'cat_slug' => 'eletronicos', 'preco' => 3499.00, 'img' => 'smartphone-ultra.jpg', 'desc' => 'Conectividade 5G, tela AMOLED vibrante e bateria de longa duração.'],
    ['nome' => 'Smartphone Lite', 'categoria' => 'Eletrônicos', 'cat_slug' => 'eletronicos', 'preco' => 1299.00, 'img' => 'smartphone-lite.png', 'desc' => 'Ótimo custo-benefício, ideal para quem busca praticidade no bolso.'],
    ['nome' => 'Fogão 4 Bocas Inox', 'categoria' => 'Cozinha', 'cat_slug' => 'cozinha', 'preco' => 899.00, 'img' => 'fogao-4bocas.jpg', 'desc' => 'Acabamento em aço inox, acendimento automático e grades esmaltadas.'],
    ['nome' => 'Fogão 5 Bocas Premium', 'categoria' => 'Cozinha', 'cat_slug' => 'cozinha', 'preco' => 1199.00, 'img' => 'fogao-5bocas.jpg', 'desc' => 'Design moderno, mesa em vidro temperado e alta durabilidade.'],
    ['nome' => 'Cooktop 4 Bocas', 'categoria' => 'Cozinha', 'cat_slug' => 'cozinha', 'preco' => 749.00, 'img' => 'cooktop.jpg', 'desc' => 'Compacto e elegante, perfeito para cozinhas planejadas.'],
];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Catálogo de Produtos | Loja Etim</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
<style>
	:root{
		--verde: #12b886;
		--verde-escuro: #0b8f68;
		--indigo: #4c3fce;
		--tinta: #16192b;
		--cinza: #6b7280;
		--fundo: #f5f6fb;
		--card: #ffffff;
		--raio: 18px;
		--dur: .35s;
	}
	*{ box-sizing: border-box; }
	body{
		margin: 0;
		font-family: 'Inter', arial, sans-serif;
		background: var(--fundo);
		color: var(--tinta);
	}
	h1, h2, h3{ font-family: 'Poppins', arial, sans-serif; margin: 0; }

	/* ===== Navbar ===== */
	.navbar{
		position: sticky;
		top: 0;
		z-index: 50;
		display: flex;
		align-items: center;
		justify-content: space-between;
		padding: 18px 6%;
		background: rgba(255,255,255,.85);
		backdrop-filter: blur(10px);
		box-shadow: 0 2px 18px rgba(16,24,40,.06);
	}
	.navbar .logo{
		font-weight: 700;
		font-size: 20px;
		letter-spacing: .3px;
		background: linear-gradient(90deg, var(--verde), var(--indigo));
		-webkit-background-clip: text;
		background-clip: text;
		color: transparent;
	}
	.navbar nav a{
		margin-left: 28px;
		text-decoration: none;
		color: var(--tinta);
		font-size: 14.5px;
		font-weight: 500;
		position: relative;
		transition: color var(--dur);
	}
	.navbar nav a::after{
		content: '';
		position: absolute;
		left: 0; bottom: -6px;
		width: 0;
		height: 2px;
		background: var(--verde);
		transition: width var(--dur);
	}
	.navbar nav a:hover{ color: var(--verde-escuro); }
	.navbar nav a:hover::after{ width: 100%; }
	.navbar nav a.ativo{ color: var(--verde-escuro); }
	.navbar nav a.ativo::after{ width: 100%; }

	/* ===== Hero ===== */
	.hero{
		position: relative;
		overflow: hidden;
		padding: 76px 6% 64px;
		text-align: center;
		background: linear-gradient(135deg, var(--indigo) 0%, var(--verde) 130%);
		color: #fff;
	}
	.hero::before, .hero::after{
		content: '';
		position: absolute;
		border-radius: 50%;
		background: rgba(255,255,255,.12);
		filter: blur(2px);
	}
	.hero::before{ width: 280px; height: 280px; top: -120px; left: -80px; }
	.hero::after{ width: 340px; height: 340px; bottom: -160px; right: -100px; background: rgba(255,255,255,.08); }
	.hero h1{
		font-size: clamp(28px, 4vw, 44px);
		font-weight: 700;
		position: relative;
	}
	.hero p{
		max-width: 560px;
		margin: 14px auto 0;
		color: rgba(255,255,255,.9);
		font-size: 16px;
		position: relative;
	}

	/* ===== Filtros ===== */
	.filtros{
		display: flex;
		flex-wrap: wrap;
		gap: 10px;
		justify-content: center;
		margin: -30px 6% 40px;
		position: relative;
		z-index: 5;
	}
	.filtro-btn{
		border: none;
		cursor: pointer;
		padding: 12px 22px;
		border-radius: 999px;
		font-family: 'Inter', arial, sans-serif;
		font-weight: 500;
		font-size: 14px;
		color: var(--tinta);
		background: #fff;
		box-shadow: 0 6px 16px rgba(16,24,40,.10);
		transition: transform var(--dur), background var(--dur), color var(--dur), box-shadow var(--dur);
	}
	.filtro-btn:hover{ transform: translateY(-2px); box-shadow: 0 10px 22px rgba(16,24,40,.16); }
	.filtro-btn.ativo{
		background: linear-gradient(90deg, var(--verde), var(--indigo));
		color: #fff;
	}

	/* ===== Grid de produtos ===== */
	main{ padding: 0 6% 90px; max-width: 1280px; margin: auto; }
	.grid{
		display: grid;
		grid-template-columns: repeat(auto-fit, minmax(255px, 1fr));
		gap: 30px;
	}

	.produto{
		background: var(--card);
		border-radius: var(--raio);
		overflow: hidden;
		box-shadow: 0 10px 26px rgba(16,24,40,.08);
		opacity: 0;
		transform: translateY(28px);
		transition: opacity .6s ease, transform .6s ease, box-shadow var(--dur);
	}
	.produto.visivel{ opacity: 1; transform: translateY(0); }
	.produto.saindo{
		opacity: 0 !important;
		transform: scale(.85) !important;
		pointer-events: none;
		transition: opacity var(--dur) ease, transform var(--dur) ease;
	}
	.produto.fora{ display: none; }
	.produto:hover{
		box-shadow: 0 20px 40px rgba(16,24,40,.18);
	}

	.produto .capa{
		position: relative;
		height: 210px;
		overflow: hidden;
	}
	.produto .capa img{
		width: 100%;
		height: 100%;
		object-fit: cover;
		display: block;
		transition: transform .6s ease;
	}
	.produto:hover .capa img{ transform: scale(1.12); }

	.badge{
		position: absolute;
		top: 14px;
		left: 14px;
		background: rgba(255,255,255,.92);
		color: var(--verde-escuro);
		font-size: 11.5px;
		font-weight: 600;
		letter-spacing: .3px;
		padding: 6px 12px;
		border-radius: 999px;
		text-transform: uppercase;
	}

	.produto .info{
		position: relative;
		padding: 18px 20px 20px;
	}
	.produto h3{
		font-size: 16.5px;
		font-weight: 600;
		line-height: 1.35;
		margin-bottom: 8px;
	}
	.preco{
		font-size: 18px;
		font-weight: 700;
		color: var(--verde-escuro);
	}
	.preco small{
		font-size: 12px;
		font-weight: 500;
		color: var(--cinza);
		margin-right: 2px;
	}

	.descricao{
		display: -webkit-box;
		-webkit-line-clamp: 3;
		-webkit-box-orient: vertical;
		overflow: hidden;
		font-size: 13.5px;
		line-height: 1.55;
		color: var(--cinza);
		max-height: 0;
		opacity: 0;
		margin-top: 0;
		transition: max-height var(--dur) ease, opacity var(--dur) ease, margin-top var(--dur) ease;
	}
	.produto:hover .descricao{
		max-height: 90px;
		opacity: 1;
		margin-top: 10px;
	}
	.produto:hover .preco{ opacity: 0; height: 0; overflow: hidden; }

	footer{
		text-align: center;
		padding: 30px 6% 40px;
		color: var(--cinza);
		font-size: 13px;
	}

	@media (max-width: 480px){
		.navbar nav a{ margin-left: 14px; font-size: 13px; }
		.hero{ padding: 56px 6% 50px; }
	}
</style>
</head>
<body>

	<header class="navbar">
		<span class="logo">Loja Etim</span>
		<nav>
			<a href="index.php">Início</a>
			<a href="produtos.php">Produtos Cadastrados</a>
			<a href="produtosestatico.php" class="ativo">Catálogo</a>
		</nav>
	</header>

	<section class="hero">
		<h1>Catálogo de Produtos</h1>
		<p>Uma vitrine estática com os itens em destaque da loja — sem depender do banco de dados.</p>
	</section>

	<div class="filtros" id="filtros">
		<button class="filtro-btn ativo" data-cat="todos">Todos</button>
		<button class="filtro-btn" data-cat="sala">Sala de Estar</button>
		<button class="filtro-btn" data-cat="vestuario">Vestuário</button>
		<button class="filtro-btn" data-cat="eletronicos">Eletrônicos</button>
		<button class="filtro-btn" data-cat="cozinha">Cozinha</button>
	</div>

	<main>
		<div class="grid" id="grid">
			<?php foreach ($produtos as $p): ?>
				<article class="produto" data-cat="<?php echo $p['cat_slug']; ?>">
					<div class="capa">
						<span class="badge"><?php echo $p['categoria']; ?></span>
						<img src="banco_imagem/<?php echo $p['img']; ?>" alt="<?php echo $p['nome']; ?>" loading="lazy">
					</div>
					<div class="info">
						<h3><?php echo $p['nome']; ?></h3>
						<div class="preco"><small>R$</small><?php echo number_format($p['preco'], 2, ',', '.'); ?></div>
						<p class="descricao"><?php echo $p['desc']; ?></p>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</main>

	<footer>Loja Etim &middot; Catálogo estático de demonstração</footer>

<script>
	// Animação de entrada (in) ao rolar a página
	const cards = document.querySelectorAll('.produto');
	const observer = new IntersectionObserver((entries) => {
		entries.forEach((entry, i) => {
			if (entry.isIntersecting) {
				setTimeout(() => entry.target.classList.add('visivel'), i * 60);
				observer.unobserve(entry.target);
			}
		});
	}, { threshold: 0.15 });
	cards.forEach(card => observer.observe(card));

	// Filtro por categoria com animação de saída (out) e entrada (in)
	const botoes = document.querySelectorAll('.filtro-btn');
	botoes.forEach(botao => {
		botao.addEventListener('click', () => {
			botoes.forEach(b => b.classList.remove('ativo'));
			botao.classList.add('ativo');
			const categoria = botao.dataset.cat;

			cards.forEach(card => {
				const pertence = categoria === 'todos' || card.dataset.cat === categoria;
				if (pertence) {
					// volta a ocupar espaço no grid e anima a entrada
					card.classList.remove('fora');
					card.offsetHeight; // força reflow antes da transição
					card.classList.remove('saindo');
					card.classList.add('visivel');
				} else {
					// anima a saída e só então remove do fluxo do grid
					card.classList.add('saindo');
					card.addEventListener('transitionend', function tirarDoFluxo(e) {
						if (e.propertyName !== 'opacity') return;
						card.removeEventListener('transitionend', tirarDoFluxo);
						if (card.classList.contains('saindo')) card.classList.add('fora');
					});
				}
			});
		});
	});
</script>

</body>
</html>
