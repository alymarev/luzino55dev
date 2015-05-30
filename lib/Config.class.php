<?php
/**
 * Created by PhpStorm.
 * User: лымарев
 * Date: 07.11.2014
 * Time: 10:01
 */

class Config {
    const DB_HOST = "localhost",
          DB_USER = "root",
          DB_PASS = "",
          DB_NAME = "luzino",
          DB_PREFIX = "l15z_",
          SECRET_SYMBOL = "{?}",
          SECRET_WORD = "Z551",
          SITE_ADDRESS = "http://luzino55.dev/",
          SITE_NAME = "Официальный сайт Лузинского сельского поселения",
        FORMAT_DATE = "%d.%m.%Y",
        DIR_AVATARS = "/images/articles/",
        DIR_GALLERY = "/images/gallery/",
        MAX_GALLERY_IMAGE_SIZE = 4000000,
          COUNT_ARTICLES_ON_PAGE = 7,
          TEMPLATES_DIR = "views/",
        ADMIN_NAME = "admin",
        DEFAULT_AVATAR = "default.jpg",
        MAX_IMAGE_SIZE = 51200,
        DIR_AVATAR = "/images/avatars/",
        MIN_SEARCH_LENGTH = 3,
        LEN_SEARCH_RES = 255,
        ADMIN_PANEL_PASSWORD = "ca18c6195d53ac42b11df813bd687e40",
          MESSAGES_FILE = "messages.ini",
        DOCUMENTS = "/docs/",
        LOG_FILE = "/libs/site.log";

} 