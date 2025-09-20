<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Simple Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --dark-gray: #1a1d21;
            --medium-gray: #24272b;
            --light-gray: #2c3034;
            --text-light: #e1e5eb;
            --text-muted: #8a8d93;
            --primary-blue: #3498db;
            --primary-blue-dark: #2980b9;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--dark-gray);
            color: var(--text-light);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            line-height: 1.6;
        }

        header {
            width: 100%;
            max-width: 800px;
            margin-bottom: 2rem;
        }

        nav {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
        }

        nav a {
            padding: 10px 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--text-light);
            text-decoration: none;
            border-radius: 4px;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        nav a:hover {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
        }

        .welcome-container {
            text-align: center;
            max-width: 600px;
            padding: 2rem;
        }

        .logo {
            font-size: 3rem;
            color: var(--primary-blue);
            margin-bottom: 1.5rem;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            background: linear-gradient(90deg, var(--primary-blue), var(--primary-blue-dark));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .welcome-text {
            font-size: 1.2rem;
            color: var(--text-muted);
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .cta-button {
            display: inline-block;
            padding: 12px 30px;
            background-color: var(--primary-blue);
            color: white;
            text-decoration: none;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .cta-button:hover {
            background-color: var(--primary-blue-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        footer {
            margin-top: 3rem;
            color: var(--text-muted);
            font-size: 0.9rem;
            text-align: center;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }
            
            .welcome-text {
                font-size: 1rem;
            }
            
            nav {
                justify-content: center;
            }
            
            nav a {
                padding: 8px 16px;
            }
        }
    </style>
</head>
<body>
  <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 text-[#1b1b18] border border-transparent hover:border-[#19140035] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

    <div class="welcome-container">
        {{-- <div class="logo">
            <i class="fas fa-cube"></i>
        </div> --}}
        <h1>Welcome to Admin Panel</h1>
        <p class="welcome-text">
            Simple, clean, and efficient administration for your platform. 
            Get started with managing your system in just a few clicks.
        </p>
        <a href="#" class="cta-button">Get Started</a>
    </div>

    <footer>
        <p>© 2025 Admin Panel. All rights reserved.</p>
    </footer>
</body>
</html>