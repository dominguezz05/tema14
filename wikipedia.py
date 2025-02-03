import requests
from bs4 import BeautifulSoup

# Hacemos una petición a la página
url = "https://es.wikipedia.org/wiki/Wikipedia:Portada"
response = requests.get(url)

# Creamos el objeto BeautifulSoup
soup = BeautifulSoup(response.text, "html.parser")

# Extraemos el título de la página
titulo = soup.title.text
print(f"El título de la página es: {titulo}")

# Buscamos la sección de "Actualidad"
actualidad_section = soup.find("div", id="main-cur")

# Si encontramos la sección, extraemos los títulos dentro de <li>
if actualidad_section:
    noticias = actualidad_section.find_all("li")  # Busca todos los elementos <li>

    print("\n📢 Noticias de Actualidad en Wikipedia:")
    for index, noticia in enumerate(noticias, 1):
        texto_noticia = noticia.get_text(" ", strip=True)  # Extraer texto y limpiar espacios
        print(f"{index}. {texto_noticia}")

else:
    print("No se encontró la sección de actualidad.")
