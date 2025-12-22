<!-- Sidebar styles -->
<style>
    .sidebar {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 2px 16px rgba(44, 62, 80, 0.06);
        padding: 1.5rem 1rem;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }

    .sidebar-item {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        padding: 0.8rem 1.2rem;
        border-radius: 10px;
        color: #6c757d;
        background: none;
        border: none;
        font-weight: 500;
        font-size: 1rem;
        transition: background 0.2s, color 0.2s;
        text-decoration: none;
        width: 100%;
    }

    .sidebar-item.active,
    .sidebar-item:hover {
        background: #ffe6e1;
        /* lighter shade for #DC452C */
        color: #DC452C;
    }

    .sidebar-item i {
        font-size: 1.2rem;
    }

    .logout-item {
        color: #e74c3c !important;
    }

    .logout-item:hover {
        background: #e74c3c !important;
        color: #fff !important;
    }

    .mobile-header {
        display: none;
    }

    .mobile-toggle {
        background: #DC452C;
        border: none;
        color: #fff;
        border-radius: 10px;
        padding: 0.6rem 1.2rem;
        font-weight: 500;
        width: 100%;
        transition: background 0.2s;
    }

    .mobile-toggle:hover,
    .mobile-toggle:focus {
        background: #b33622;
        color: #fff;
    }

    @media (max-width: 991.98px) {
        .mobile-header {
            display: block;
            background: #fff;
            border-radius: 12px;
            padding: 0.7rem 1rem;
            margin-bottom: 1rem;
            box-shadow: 0 2px 8px rgba(44, 62, 80, 0.06);
        }

        .sidebar {
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
            gap: 0;
            padding: 1rem 0.5rem;
        }

        .sidebar-item span {
            display: none;
        }

        .sidebar-item i {
            font-size: 1.5rem;
        }
    }
</style>

<!-- Profile -->

<style>
    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        background: #f4f6fb;
        min-height: 100vh;
        color: #222;
    }

    .container-wrapper {
        max-width: 1100px;
        margin: 3rem auto;
        padding: 0 1rem;
    }

  
    .logout-item:hover {
        background: #e74c3c !important;
        color: #fff !important;
    }

    .mobile-header {
        display: none;
    }

    .mobile-toggle {
        background: #DC452C;
        border: none;
        color: #fff;
        border-radius: 10px;
        padding: 0.6rem 1.2rem;
        font-weight: 500;
        width: 100%;
        transition: background 0.2s;
    }

    .mobile-toggle:hover,
    .mobile-toggle:focus {
        background: #b33622;
        color: #fff;
    }

    @media (max-width: 991.98px) {
        .container-wrapper {
            margin: 1rem;
        }

        .profile-card {
            padding: 1.2rem;
        }

        .profile-name {
            font-size: 1.5rem;
        }

        .sidebar {
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
            gap: 0;
            padding: 1rem 0.5rem;
        }

        .sidebar-item span {
            display: none;
        }

        .sidebar-item i {
            font-size: 1.5rem;
        }

        .mobile-header {
            display: block;
            background: #fff;
            border-radius: 12px;
            padding: 0.7rem 1rem;
            margin-bottom: 1rem;
            box-shadow: 0 2px 8px rgba(44, 62, 80, 0.06);
        }
    }

    @media (max-width: 576px) {
        .profile-card {
            padding: 0.7rem;
        }

        .profile-avatar {
            width: 90px;
            height: 90px;
        }

        .profile-name {
            font-size: 1.1rem;
        }
    }

    .profile-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 2px 16px rgba(44, 62, 80, 0.07);
        padding: 2.5rem 2rem 2rem 2rem;
        text-align: center;
        margin-bottom: 2rem;
    }

    .avatar-container {
        margin-bottom: 1.2rem;
    }

    .profile-avatar {
        width: 130px;
        height: 130px;
        border-radius: 50%;
        border: 4px solid #eafaf7;
        object-fit: cover;
        box-shadow: 0 4px 16px rgba(44, 62, 80, 0.08);
    }

    .profile-name {
        font-size: 2.1rem;
        font-weight: 700;
        color: #222;
        margin-bottom: 0.2rem;
    }

    .profile-info-list {
        margin: 2rem auto 0 auto;
        max-width: 400px;
        text-align: left;
    }

    .profile-info-item {
        display: flex;
        align-items: center;
        gap: 0.7rem;
        font-size: 1.08rem;
        color: #333;
        margin-bottom: 1.1rem;
    }

    .edit-profile-link {
        display: inline-block;
        margin-top: 1.5rem;
        background: #DC452C;
        color: #fff;
        border-radius: 30px;
        padding: 0.7rem 2.1rem;
        font-weight: 600;
        font-size: 1.1rem;
        text-decoration: none;
        transition: background 0.2s;
    }
</style>

<!-- Update Profile -->

<style>
    /* Reset and base styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        background: #f4f6fb;
        min-height: 100vh;
        color: #222;
    }

    .container-wrapper {
        max-width: 1100px;
        margin: 3rem auto;
        padding: 0 1rem;
    }

    /* Sidebar */
    .sidebar {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 2px 16px rgba(44, 62, 80, 0.06);
        padding: 1.5rem 1rem;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }

    .sidebar-item {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        padding: 0.8rem 1.2rem;
        border-radius: 10px;
        color: #6c757d;
        background: none;
        border: none;
        font-weight: 500;
        font-size: 1rem;
        transition: background 0.2s, color 0.2s;
        text-decoration: none;
        width: 100%;
    }

    .sidebar-item.active,
    .sidebar-item:hover {
        background: #ffe6e1;
        /* lighter shade for #DC452C */
        color: #DC452C;
    }

    .sidebar-item i {
        font-size: 1.2rem;
    }

    .logout-item {
        color: #e74c3c !important;

    }

    .logout-item:hover {
        background: #e74c3c !important;
        color: #fff !important;
    }

    /* Profile Card */
    .profile-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 2px 16px rgba(44, 62, 80, 0.07);
        padding: 2.5rem 2rem 2rem 2rem;
        text-align: center;
        margin-bottom: 2rem;
    }

    .avatar-container {
        margin-bottom: 1.2rem;
    }

    .profile-avatar {
        width: 130px;
        height: 130px;
        border-radius: 50%;
        border: 4px solid #eafaf7;
        object-fit: cover;
        box-shadow: 0 4px 16px rgba(44, 62, 80, 0.08);
    }

    .btn-upload {
        margin-top: 1rem;
        background: #f4f6fb;
        color: #DC452C;
        border: 1.5px solid #DC452C;
        border-radius: 10px;
        padding: 0.5rem 1.2rem;
        font-size: 1rem;
        font-weight: 500;
        transition: background 0.2s, color 0.2s;
    }

    .btn-upload:hover {
        background: #DC452C;
        color: #fff;
    }

    .profile-name {
        font-size: 2.1rem;
        font-weight: 700;
        color: #222;
        margin-bottom: 0.2rem;
    }

    /* Form Card */
    .form-card {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 2px 16px rgba(44, 62, 80, 0.07);
        padding: 2rem 2rem 1.5rem 2rem;
    }

    .form-label {
        font-weight: 600;
        color: #222;
        margin-bottom: 0.5rem;
    }

    .modern-input {
        border-radius: 10px;
        border: 1.5px solid #eafaf7;
        background: #f8fafc;
        padding: 0.9rem 1.2rem;
        font-size: 1rem;
        color: #222;
        transition: border 0.2s;
    }

    .modern-input:focus {
        border-color: #DC452C;
        background: #fff;
        outline: none;
    }

    .modern-input:disabled {
        background: #f4f6fb;
        color: #b0b0b0;
    }

    /* Password Section */
    .password-section {
        background: #f8fafc;
        border-radius: 14px;
        padding: 1.5rem 1rem;
        margin-top: 2rem;
        border: 1px solid #eafaf7;
    }

    .password-title {
        color: #DC452C;
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 1.2rem;
        text-align: left;
    }

    /* Button */
    .btn-primary-modern {
        background: #DC452C;
        border: none;
        color: #fff;
        padding: 0.9rem 2.5rem;
        border-radius: 30px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: background 0.2s, box-shadow 0.2s;
        box-shadow: 0 2px 8px rgba(220, 69, 44, 0.13);
        position: relative;
    }

    .btn-primary-modern:hover {
        background: #b33622;
        box-shadow: 0 4px 16px rgba(220, 69, 44, 0.18);
    }

    /* Responsive */
    @media (max-width: 991.98px) {
        .container-wrapper {
            margin: 1rem;
        }

        .profile-card,
        .form-card {
            padding: 1.2rem;
        }

        .profile-name {
            font-size: 1.5rem;
        }

        .sidebar {
            padding: 1rem 0.5rem;
        }
    }

    @media (max-width: 576px) {

        .profile-card,
        .form-card {
            padding: 0.7rem;
        }

        .profile-avatar {
            width: 90px;
            height: 90px;
        }

        .profile-name {
            font-size: 1.1rem;
        }
    }

    /* Mobile sidebar toggle */
    .mobile-header {
        display: none;
    }

    @media (max-width: 991.98px) {
        .mobile-header {
            display: block;
            background: #fff;
            border-radius: 12px;
            padding: 0.7rem 1rem;
            margin-bottom: 1rem;
            box-shadow: 0 2px 8px rgba(44, 62, 80, 0.06);
        }

        .mobile-toggle {
            background: #DC452C;
            border: none;
            color: #fff;
            border-radius: 10px;
            padding: 0.6rem 1.2rem;
            font-weight: 500;
            width: 100%;
        }

        .mobile-toggle:hover {
            background: #b33622;
        }

        .sidebar {
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
            gap: 0;
        }

        .sidebar-item span {
            display: none;
        }

        .sidebar-item i {
            font-size: 1.5rem;
        }
    }
</style>

