import os
import requests

def download_images(url_pattern, start_index, end_index, save_folder):
    if not os.path.exists(save_folder):
        os.makedirs(save_folder)

    for i in range(start_index, end_index + 1):
        url = url_pattern.format(str(i).zfill(3))
        filename = os.path.join(save_folder, f"kazetachinu{str(i).zfill(3)}.jpg")
        response = requests.get(url)
        if response.status_code == 200:
            with open(filename, 'wb') as file:
                file.write(response.content)
            print(f"Downloaded {filename}")
        else:
            print(f"Failed to download {filename}")

# Usage example
url_pattern = "https://www.ghibli.jp/gallery/kazetachinu{0}.jpg"
# url_pattern = "https://www.ghibli.jp/gallery/totoro{0}.jpg"
start_index = 1
end_index = 50
save_folder = "D:\Download\Coding\Assets\Kazetachinu"

download_images(url_pattern, start_index, end_index, save_folder)
