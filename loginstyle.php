<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #333;
            text-align: left;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s, transform 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        input[type="submit"]:active {
            transform: scale(0.95);
        }

        .return-button {
            background-color: #f44336;
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            margin-bottom: 15px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .return-button:hover {
            background-color:rgb(226, 15, 15);
            transform: scale(1.05);
        }

        .return-button:active {
            transform: scale(0.95);
        }

        .error-message {
            color: #f44336;
            margin-top: 10px;
        }

        .success-message {
            color: #4caf50; 
            margin-top: 10px;
        }
    </style>