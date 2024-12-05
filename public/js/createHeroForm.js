// Waiting for the DOM to load
document.addEventListener("DOMContentLoaded", function() {
    // NEW FACTION
    const newFactionButton = document.getElementById("new-faction-button");

    newFactionButton.addEventListener("click", (e) => {
        e.preventDefault();

        // Faction Form
        const newFactionForm = document.getElementById("new-faction-form");
        newFactionForm.removeAttribute('style');

        // Universe Selector
        const universeSelector = document.getElementById('universe-selector');
        universeSelector.removeAttribute('style');

        // Remove the faction selector and new faction button
        const factionSelector = document.getElementById("faction-selector");
        factionSelector.remove();
        newFactionButton.remove();

        // Show the new universe button
        const newUniverseButton = document.getElementById("new-universe-button");
        newUniverseButton.removeAttribute("style");

        newUniverseButton.addEventListener("click", (e) => {
            e.preventDefault();

            // New Universe Form
            const newUniverseForm = document.getElementById("new-universe-form");
            newUniverseForm.removeAttribute('style');

            // Remove the Universe selector and new universe button
            universeSelector.remove();
            newUniverseButton.remove();
        })
    });

    // NEW WEAPON
    const newWeaponButton = document.getElementById("new-weapon-button");
    newWeaponButton.addEventListener("click", (e) => {
        e.preventDefault();
        // Weapon Form
        const newWeaponForm = document.getElementById("new-weapon-form");
        newWeaponForm.removeAttribute('style');
        const weaponSelector = document.getElementById('weapon-selector');
        weaponSelector.remove();
        newWeaponButton.remove();
    })
});
