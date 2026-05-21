<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>University Administration Portal</title>
    <style>
        /* Core Layout Design System */
        body { 
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; 
            margin: 0; 
            background: #f4f6f9; 
            color: #333; 
        }
        .navbar { 
            background: #2c3e50; 
            color: #fff; 
            padding: 15px 20px; 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .wrapper { 
            display: flex; 
            min-height: calc(100vh - 60px); 
        }

        /* Sidebar Control Navigation */
        .sidebar { 
            width: 250px; 
            background: #34495e; 
            color: #fff; 
            padding: 20px; 
            box-sizing: border-box; 
        }
        .sidebar h3 {
            margin-top: 0;
            margin-bottom: 15px;
            padding-left: 12px;
        }
        .sidebar a { 
            display: block; 
            color: #ecf0f1; 
            padding: 12px; 
            text-decoration: none; 
            border-radius: 4px; 
            margin-bottom: 5px; 
            font-weight: 500; 
            font-size: 14px;
            transition: background 0.2s ease;
        }
        .sidebar a:hover { 
            background: #16a085; 
            color: #fff; 
        }

        /* Component Content Panels */
        .main-content { 
            flex: 1; 
            padding: 30px; 
            box-sizing: border-box; 
        }
        .card { 
            background: #fff; 
            padding: 25px; 
            border-radius: 6px; 
            box-shadow: 0 2px 8px rgba(0,0,0,0.06); 
            margin-bottom: 25px; 
        }
        h2 {
            margin-top: 0;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        /* Administrative Interactive Tables */
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 15px; 
            background: #fff; 
        }
        table, th, td { 
            border: 1px solid #e2e8f0; 
        }
        th, td { 
            padding: 12px; 
            text-align: left; 
        }
        th { 
            background: #edf2f7; 
            color: #4a5568; 
            font-weight: 600; 
        }
        tr:hover {
            background: #f8fafc;
        }

        /* Form Controls & Grids */
        .form-grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); 
            gap: 15px; 
            margin-bottom: 15px; 
        }
        .form-group { 
            margin-bottom: 15px; 
        }
        .form-group label { 
            display: block; 
            margin-bottom: 5px; 
            font-weight: 600; 
            font-size: 14px; 
            color: #4a5568; 
        }
        .form-control { 
            width: 100%; 
            padding: 10px; 
            border: 1px solid #cbd5e0; 
            border-radius: 4px; 
            box-sizing: border-box; 
            font-size: 14px;
            color: #333;
        }
        .form-control:focus {
            outline: none;
            border-color: #16a085;
            box-shadow: 0 0 0 3px rgba(22, 160, 133, 0.1);
        }

        /* System UI Feedback Action Buttons */
        .btn { 
            padding: 9px 16px; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer; 
            font-size: 14px; 
            font-weight: 500; 
            text-decoration: none; 
            display: inline-block; 
            transition: background 0.2s ease;
        }
        .btn-primary { background: #16a085; color: white; }
        .btn-primary:hover { background: #148f77; }
        
        .btn-danger { background: #e74c3c; color: white; }
        .btn-danger:hover { background: #c0392b; }
        
        .btn-secondary { background: #7f8c8d; color: white; }
        .btn-secondary:hover { background: #6c7a7d; }

        .alert { 
            padding: 12px; 
            border-radius: 4px; 
            margin-bottom: 20px; 
            background: #d4edda; 
            color: #155724; 
            border-left: 5px solid #28a745; 
            font-weight: 500; 
        }
    </style>
</head>
<body>