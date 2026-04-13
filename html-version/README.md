# Nah Granja — Versão HTML Estática

Site completo em HTML/CSS/JS puro, pronto para hospedagem em qualquer servidor PHP.

## Arquivos

| Arquivo | Descrição |
|---------|-----------|
| `index.html` | Página principal (hero, planta interativa, espaços, gastronomia, formulário) |
| `sala-pau-ferro.html` | Página detalhada da Sala Pau-Ferro com galeria e lightbox |
| `sala-pitangueiras.html` | Página detalhada da Sala Pitangueiras com galeria e lightbox |
| `contato.php` | Script PHP para envio de e-mail pelo formulário |

## Funcionalidades

- ✅ Menu mobile com hamburger
- ✅ Navbar com efeito de scroll
- ✅ Hero com animação de partículas
- ✅ Planta interativa com hover (overlay) e clique (zoom + navegação)
- ✅ Carrosséis automáticos com paginação
- ✅ Crossfade de imagens na Sala Pitangueiras
- ✅ Galeria com Lightbox (teclado + setas)
- ✅ Formulário com 3 opções de envio: WhatsApp, mailto e PHP
- ✅ Animações reveal ao scroll (IntersectionObserver)
- ✅ Totalmente responsivo

## Hospedagem

1. Faça upload de todos os arquivos para a raiz ou subpasta do servidor
2. Certifique-se de que o PHP está habilitado no servidor
3. Configure o e-mail de destino em `contato.php` (variável `$destinatario`)
4. Pronto — sem banco de dados, sem dependências externas

## Dependências (CDN)

- Google Fonts: Cormorant Garamond + Raleway (carregados via link)
- Sem frameworks, sem bibliotecas JS externas
