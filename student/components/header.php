<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>University Student Portal</title>
    <style>
        body { font-family: system-ui, -apple-system, sans-serif; margin: 0; background: #f4f6f9; color: #333; }
        .navbar { background: #1a252f; color: #fff; padding: 15px 20px; display: flex; justify-content: space-between; align-items: center; }
        .wrapper { display: flex; min-height: calc(100vh - 60px); }
        .sidebar { width: 240px; background: #2c3e50; color: #fff; padding: 20px; box-sizing: border-box; }
        .sidebar a { display: block; color: #b8c7ce; padding: 12px; text-decoration: none; border-radius: 4px; margin-bottom: 5px; font-size: 15px; }
        .sidebar a:hover, .sidebar a.active { background: #34495e; color: #fff; }
        .main-content { flex: 1; padding: 30px; box-sizing: border-box; }
        .card { background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        table, th, td { border: 1px solid #e0e0e0; }
        th, td { padding: 12px; text-align: left; }
        th { background: #f8f9fa; }
        .btn { background: #2c3e50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 14px; font-weight: 500; }
        .btn:hover { background: #1a252f; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; color: #555; }
        .form-control { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; font-size: 14px; }
        .badge { padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: bold; display: inline-block; }
        .badge-paid { background: #d4edda; color: #155724; }
        .badge-pending { background: #fff3cd; color: #856404; }
        .alert { padding: 12px; border-radius: 4px; margin-bottom: 15px; background: #d4edda; color: #155724; font-weight: 500; }
    </style>
</head>
<body>