import yt_dlp
import sys
import warnings
import logging
import shutil
import os
import time

# Suppress all Python warnings
warnings.filterwarnings("ignore")

# Set up logging to capture logs
logging.basicConfig(level=logging.INFO, format='%(asctime)s - %(levelname)s - %(message)s', stream=sys.stdout)

def download_video(url, save_path='.'):
    # yt-dlp options
    timestamp = str(int(time.time())) 
    ydl_opts = {
        'format': 'best',
        'outtmpl': f'{save_path}/{timestamp}.%(ext)s',
        # 'outtmpl': f'{save_path}/%(title)s.%(ext)s',  # Save video in the specified path
        'quiet': True,  # Set to True to suppress yt-dlp output
        'no_warnings': True,  # Suppress warnings
    }

    try:
        # Using yt-dlp to download the video
        with yt_dlp.YoutubeDL(ydl_opts) as ydl:
            # logging.info(f"Starting download for URL: {url}")
            info = ydl.extract_info(url, download=True)
            file_name = ydl.prepare_filename(info)
            # logging.info(f"Download completed successfully: {file_name}")

            # Move the downloaded file to Laravel storage directory
            storage_path = '/home/neeraj/Public/neeraj/laravel_11/Laravel-python/magicTools/storage/app/public/videos/'  # Specify your Laravel storage path here
            if not os.path.exists(storage_path):
                os.makedirs(storage_path)

            # Move the file to the storage path
            shutil.move(file_name, os.path.join(storage_path, os.path.basename(file_name)))
            # logging.info(f"Moved the downloaded file to: {storage_path}")

            # Return the file path in storage
            return os.path.join(storage_path, os.path.basename(file_name))

    except Exception as e:
        logging.error(f"Error during download: {str(e)}")
        raise

# Get the video URL from the command-line argument
video_url = sys.argv[1] if len(sys.argv) > 1 else None

# Download the video and handle errors
if video_url:
    try:
        downloaded_file = download_video(video_url)
        logging.info(f"Downloaded file: {downloaded_file}")
    except Exception as e:
        logging.error(f"Failed to download the video. Error: {str(e)}")
else:
    logging.error("No video URL provided.")
