document.addEventListener("DOMContentLoaded", function () {
    // Cache DOM elements
    const elements = {
        weightRadio: document.getElementById("byWeight"),
        volumeRadio: document.getElementById("byVolume"),
        weightInput: document.getElementById("weightInput"),
        volumeInput: document.getElementById("volumeInput"),
        form: document.getElementById("priceCalculatorForm"),
        resultDiv: document.getElementById("priceResult"),
        resultDetails: document.getElementById("resultDetails"),
        weightInput: document.getElementById("weight"),
        lengthInput: document.getElementById("length"),
        widthInput: document.getElementById("width"),
        heightInput: document.getElementById("height"),
        originSelect: document.getElementById("origin"),
        destinationSelect: document.getElementById("destination"),
        serviceTypeSelect: document.getElementById("serviceType"),
    };

    // Set initial state
    elements.weightInput.style.display = "block";
    elements.volumeInput.style.display = "none";
    elements.weightInput.required = true;

    // Event listeners
    elements.weightRadio.addEventListener("change", toggleCalculationMethod);
    elements.volumeRadio.addEventListener("change", toggleCalculationMethod);
    elements.form.addEventListener("submit", handleFormSubmit);

    function toggleCalculationMethod() {
        const isWeight = elements.weightRadio.checked;
        elements.weightInput.style.display = isWeight ? "block" : "none";
        elements.volumeInput.style.display = isWeight ? "none" : "block";

        elements.weightInput.required = isWeight;
        elements.lengthInput.required = !isWeight;
        elements.widthInput.required = !isWeight;
        elements.heightInput.required = !isWeight;
    }

    function handleFormSubmit(e) {
        e.preventDefault();
        try {
            const result = calculatePrice();
            displayResult(result);
        } catch (error) {
            console.error("Calculation error:", error);
            alert(error.message || "Terjadi kesalahan dalam perhitungan");
        }
    }

    function calculatePrice() {
        // Get form values
        const method = document.querySelector(
            'input[name="calculationMethod"]:checked'
        ).value;
        const origin = elements.originSelect.value;
        const destination = elements.destinationSelect.value;
        const serviceType = elements.serviceTypeSelect.value;

        // Validation
        if (!origin || !destination || !serviceType) {
            throw new Error("Silakan lengkapi semua data yang diperlukan");
        }

        // Base rates (IDR)
        const baseRates = {
            darat: { perKg: 4000, perCm3: 40 },
            udara: { perKg: 6000, perCm3: 75 },
            laut: { perKg: 5000, perCm3: 25 },
        };

        const service = baseRates[serviceType] || baseRates.darat;
        let price, calculationDetails;

        if (method === "weight") {
            const weight = parseFloat(elements.weightInput.value);
            if (!weight || weight <= 0)
                throw new Error("Masukkan berat yang valid");

            price = weight * service.perKg;
            calculationDetails = `
                <div class="price-detail"><span>Berat:</span><span>${weight} kg</span></div>
                <div class="price-detail"><span>Tarif:</span><span>Rp ${service.perKg.toLocaleString(
                    "id-ID"
                )}/kg</span></div>
            `;
        } else {
            const length = parseFloat(elements.lengthInput.value);
            const width = parseFloat(elements.widthInput.value);
            const height = parseFloat(elements.heightInput.value);

            if (!length || !width || !height)
                throw new Error("Masukkan dimensi yang valid");

            const volume = length * width * height;
            price = volume * service.perCm3;
            calculationDetails = `
                <div class="price-detail"><span>Volume:</span><span>${volume} cm³</span></div>
                <div class="price-detail"><span>Dimensi:</span><span>${length} × ${width} × ${height} cm</span></div>
                <div class="price-detail"><span>Tarif:</span><span>Rp ${service.perCm3.toLocaleString(
                    "id-ID"
                )}/cm³</span></div>
            `;
        }

        // Apply distance factor
        if (origin !== destination) {
            price *= 1.2; // 20% extra for inter-city shipping
        }

        return {
            price,
            calculationDetails,
            serviceLabel: service.label,
            origin: elements.originSelect.options[
                elements.originSelect.selectedIndex
            ].text,
            destination:
                elements.destinationSelect.options[
                    elements.destinationSelect.selectedIndex
                ].text,
        };
    }

    function displayResult({
        price,
        calculationDetails,
        serviceLabel,
        origin,
        destination,
    }) {
        elements.resultDetails.innerHTML = `
            ${calculationDetails}
            <div class="price-detail"><span>Jenis Layanan:</span><span>${serviceLabel}</span></div>
            <div class="price-detail"><span>Rute Pengiriman:</span><span>${origin} → ${destination}</span></div>
            <div class="price-total">Total Biaya: Rp ${price.toLocaleString(
                "id-ID"
            )}</div>
            <div class="price-note mt-2 text-muted">* Harga dapat berubah sesuai kondisi aktual</div>
        `;
        elements.resultDiv.style.display = "block";
        elements.resultDiv.scrollIntoView({
            behavior: "smooth",
            block: "nearest",
        });
    }
});
