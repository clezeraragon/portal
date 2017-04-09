{{'<'.'?'. 'xml version="1.0" encoding="UTF-8"?>'}}
<urlset
        xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xmlns:xhtml="http://www.w3.org/1999/xhtml"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    @foreach($rotasEstaticas as $key => $teste)
        <url>
            <loc>{{$rotasEstaticas[$key]}}</loc>
            <priority>0.9</priority>
            <lastmod>{{$data_atual}}</lastmod>
            <changefreq>daily</changefreq>
        </url>
    @endforeach
    @foreach($rotasConteudo as $key => $conteudo)
        <url>
            <loc>{{$conteudo}}</loc>
            <priority>0.5</priority>
            <lastmod>{{$data_atual}}</lastmod>
            <changefreq>daily</changefreq>
        </url>
    @endforeach
    @foreach($rotasConteudoPaiEFilha as $key => $categoria)
        <url>
            <loc>{{$categoria['url']}}</loc>
            <priority>0.5</priority>
            <lastmod>{{$data_atual}}</lastmod>
            <changefreq>daily</changefreq>
        </url>
    @endforeach
    @foreach($rotasGuiaEmpresaConteudo as $key => $conteudo)
        <url>
            <loc>{{$conteudo}}</loc>
            <priority>0.5</priority>
            <lastmod>{{$data_atual}}</lastmod>
            <changefreq>daily</changefreq>
        </url>
    @endforeach
    @foreach($rotasGuiaEmpresa as $key => $conteudo)
        <url>
            <loc>{{$conteudo}}</loc>
            <priority>0.5</priority>
            <lastmod>{{$data_atual}}</lastmod>
            <changefreq>daily</changefreq>
        </url>
    @endforeach
    @foreach($rotasProduto as $key => $produto)
        <url>
            <loc>{{$produto}}</loc>
            <priority>0.5</priority>
            <lastmod>{{$data_atual}}</lastmod>
            <changefreq>daily</changefreq>
        </url>
    @endforeach
</urlset>

