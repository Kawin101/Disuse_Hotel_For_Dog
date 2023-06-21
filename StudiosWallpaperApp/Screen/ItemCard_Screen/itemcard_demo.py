import io
import tkinter as tk
from PIL import ImageTk, Image
import requests

# Sample card items
card_items = [
    {
        'name': 'Item 1',
        'image_url': 'https://www.ghibli.jp/gallery/totoro001.jpg'
    },
    {
        'name': 'Item 2',
        'image_url': 'https://www.ghibli.jp/gallery/totoro025.jpg'
    },
    {
        'name': 'Item 3',
        'image_url': 'https://www.ghibli.jp/gallery/totoro050.jpg'
    }
]

def display_image(url):
    response = requests.get(url)
    image_data = response.content
    image = Image.open(io.BytesIO(image_data))
    image = image.resize((450, 450))  # Adjust size as per your requirement
    photo = ImageTk.PhotoImage(image)
    image_label.configure(image=photo)
    image_label.image = photo

def select_item(event):
    selected_item = listbox.get(listbox.curselection())
    for item in card_items:
        if item['name'] == selected_item:
            display_image(item['image_url'])
            break

# Create the main window
window = tk.Tk()
window.title("Card Items")
window.geometry("1600x900")

# Create the listbox
listbox = tk.Listbox(window, selectmode=tk.SINGLE)
listbox.pack(pady=10)

# Add card items to the listbox
for item in card_items:
    listbox.insert(tk.END, item['name'])

# Create the image label
image_label = tk.Label(window)
image_label.pack(pady=10)

# Bind the select_item function to the listbox selection event
listbox.bind('<<ListboxSelect>>', select_item)

# Start the Tkinter event loop
window.mainloop()
