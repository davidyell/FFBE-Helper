<div class="units party">
    <h2>Build a party</h2>

    <ul class="nav nav-tabs">
        <li class="active"><?= $this->Html->link('Best in role', ['action' => 'partyBalanced']);?></li>
        <li><?= $this->Html->link('Best by stats', ['action' => 'partyStats']);?></li></li>
        <li><a href="#Physical">Physical</a></li>
        <li><a href="#Magical">Magical</a></li>
    </ul>

    <h3>Balanced party by role</h3>
    <p>A party based on the best units in a specific role, based on their highest rarity stats. Then it'll select non-role units based on the stats for the role.</p>

    <table id="party-table">
        <thead>
            <tr>
                <th>Tank</th>
                <th>Physical DPS</th>
                <th>Magical DPS</th>
                <th>Support</th>
                <th>Healer</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $this->element('unit-card', ['unit' => $tank, 'stats' => $tankStats]);?></td>
                <td><?= $this->element('unit-card', ['unit' => $physicalDps, 'stats' => $physicalStats]);?></td>
                <td><?= $this->element('unit-card', ['unit' => $magicalDps, 'stats' => $magicalStats]);?></td>
                <td><?= $this->element('unit-card', ['unit' => $support, 'stats' => $supportStats]);?></td>
                <td><?= $this->element('unit-card', ['unit' => $healer, 'stats' => $healerStats]);?></td>
            </tr>
        </tbody>
    </table>
</div>