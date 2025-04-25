<!-- Loading Animation Component -->
<div id="loading-animation" class="loading-overlay active">
    <div class="loading-content">
        <div class="loader">
            <div class="circle-group">
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
            </div>
        </div>
        <div class="loading-text">Loading...</div>
    </div>
</div>

<style>
.loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.95);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
}

.loading-overlay.active {
    opacity: 1;
    visibility: visible;
}

.loading-content {
    text-align: center;
}

.loader {
    position: relative;
    width: 120px;
    height: 120px;
    margin: 0 auto;
    perspective: 800px;
}

.circle-group {
    position: absolute;
    width: 100%;
    height: 100%;
    transform-style: preserve-3d;
    animation: rotate 2s infinite linear;
}

.circle {
    position: absolute;
    width: 100%;
    height: 100%;
    border: 4px solid transparent;
    border-radius: 50%;
    animation: morph 1.5s ease-in-out infinite alternate;
}

.circle:nth-child(1) {
    border-top-color: var(--colorPrimary, #3498db);
    transform: rotateX(120deg) rotateY(0deg);
}

.circle:nth-child(2) {
    border-right-color: var(--colorPrimary, #3498db);
    transform: rotateX(240deg) rotateY(0deg);
    animation-delay: 0.5s;
}

.circle:nth-child(3) {
    border-bottom-color: var(--colorPrimary, #3498db);
    transform: rotateX(360deg) rotateY(0deg);
    animation-delay: 1s;
}

.loading-text {
    color: var(--colorPrimary, #3498db);
    font-size: 18px;
    font-weight: 500;
    letter-spacing: 1px;
    margin-top: 20px;
    opacity: 0.9;
    animation: pulse 1.5s ease-in-out infinite alternate;
}

@keyframes rotate {
    0% {
        transform: rotateX(0deg) rotateY(0deg);
    }
    100% {
        transform: rotateX(360deg) rotateY(360deg);
    }
}

@keyframes morph {
    0% {
        transform-origin: 50% 50%;
        transform: rotate(0deg) scale(1);
        border-radius: 50%;
    }
    50% {
        transform: rotate(180deg) scale(0.8);
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
    }
    100% {
        transform: rotate(360deg) scale(1);
        border-radius: 50%;
    }
}

@keyframes pulse {
    0% {
        opacity: 0.6;
        transform: scale(0.98);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}
</style>

<script>
// The loading animation is now active by default in the HTML
// We only need to handle hiding it when the page is loaded

document.addEventListener('DOMContentLoaded', function() {
    const loadingAnimation = document.getElementById('loading-animation');

    // Hide loading animation
    function hideLoading() {
        loadingAnimation.classList.remove('active');
    }

    // Hide loading when page is fully loaded
    window.addEventListener('load', function() {
        setTimeout(hideLoading, 500); // Add a small delay for smooth transition
    });

    // Show loading on AJAX requests
    $(document).ajaxStart(function() {
        loadingAnimation.classList.add('active');
    });

    // Hide loading when AJAX requests complete
    $(document).ajaxComplete(function() {
        setTimeout(hideLoading, 500);
    });
});
</script>
