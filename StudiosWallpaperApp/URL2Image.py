import os
import requests
from bs4 import BeautifulSoup

def download_images(url):
    # Send a GET request to the URL
    response = requests.get(url)
    if response.status_code == 200:
        # Parse the HTML content using BeautifulSoup
        soup = BeautifulSoup(response.content, 'html.parser')
        # Find all elements with the class 'panel-img-top'
        image_elements = soup.find_all(class_='panel-img-top')

        # Create a directory to save the images (if it doesn't exist)
        save_directory = 'D:\Download\Coding\Assets\Totoro'
        if not os.path.exists(save_directory):
            os.makedirs(save_directory)

        # Download and save each image as .png
        for index, image in enumerate(image_elements):
            image_url = image['src']
            image_response = requests.get(image_url)
            if image_response.status_code == 200:
                image_path = os.path.join(save_directory, f'image{index + 1}.jpeg')
                with open(image_path, 'wb') as file:
                    file.write(image_response.content)
                print(f'Saved image {index + 1}.')

        print('All images downloaded successfully.')
    else:
        print('Failed to retrieve website content.')

# Example usage
url = 'https://www.ghibli.jp/works/totoro/'
download_images(url)