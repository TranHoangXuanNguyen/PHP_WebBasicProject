<style>
    body {
        background-color: #f9f9f9;
        font-family: Arial, sans-serif;
    }

    #feed-container {
        padding: 20px 30px;
        max-width: 80%;
        margin: 30px auto;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .image {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        border: 2px solid #ddd;
    }

    .userimage {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 2px solid #ddd;
    }

    .arrow {
        font-size: 20px;
        color: #f5c518;
        cursor: pointer;
        transition: transform 0.3s;
        border: none;
    }

    .arrow:hover {
        transform: scale(1.1);
        color: #f5c518;
    }

    button[type="submit"].bg-none {
        background-color: transparent !important;
        border: none;
    }

    .icon-start i {
        color: #ccc;
        font-size: 20px;
        transition: color 0.3s;
    }

    .icon-start i.fa-solid {
        color: #f5c518;
    }

    .icon-start i:hover {
        color: #f5c518;
    }

    .card.feed-desc {
        background-color: #fefefe;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        font-size: 14px;
        padding: 15px;
        color: #555;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        transition: border-color 0.3s;
    }

    input[type="text"]:focus {
        border-color: #f5c518;
        outline: none;
        box-shadow: 0 0 5px rgba(204, 178, 6, 0.5);
    }

    .feed-title {
        font-weight: bold;
        color: #333;
        font-size: 24px;
    }

    .btn-warning {
        margin-left: 400px;
        border: none;
    }

    .alert {
        padding: 10px;
        margin-bottom: 15px;
    }

    .page-item {
    margin: 0 5px;
}

.page-link {
    display: block;
    padding: 8px 16px;
    text-decoration: none;
    background-color: #f8f9fa;
    color:black;
    border: 1px solid #ddd;
    border-radius: 4px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.page-link:hover {
    background-color: #f5c518;
    color: white;
}

.page-item.active .page-link {
    background-color: #f5c518;
    color: white;
    pointer-events: none; 
    border: none;
}

.page-item.disabled .page-link {
    background-color: #f8f9fa;
    color: #ddd;
    pointer-events: none; 
}
</style>