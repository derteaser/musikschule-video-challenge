<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Http\Livewire\UpdateProfileInformationForm;
use Livewire\Livewire;
use Tests\TestCase;

class ProfileInformationTest extends TestCase
{
    use RefreshDatabase;

    public function test_current_profile_information_is_available()
    {
        /** @var User $user */
        $this->actingAs($user = User::factory()->create());

        /** @var UpdateProfileInformationForm $component */
        $component = Livewire::test(UpdateProfileInformationForm::class);

        $this->assertEquals($user->name, $component->state['name']);
        $this->assertEquals($user->email, $component->state['email']);
        $this->assertEquals($user->nickname, $component->state['nickname']);
        $this->assertEquals($user->city, $component->state['city']);
        $this->assertEquals($user->birthday->format('Y-m-d'), $component->state['birthday']);
    }

    public function test_profile_information_can_be_updated()
    {
        /** @var User $user */
        $this->actingAs($user = User::factory()->create());

        Livewire::test(UpdateProfileInformationForm::class)
                ->set('state', ['name' => 'Test Name', 'email' => 'test@example.com', 'nickname' => 'Nick Name', 'city' => 'Big Town', 'birthday' => '1980-01-01', 'teacher' => 'Beethoven', 'musical_instrument_id' => 2])
                ->call('updateProfileInformation');

        $this->assertEquals('Test Name', $user->fresh()->name);
        $this->assertEquals('test@example.com', $user->fresh()->email);
        $this->assertEquals('Nick Name', $user->fresh()->nickname);
        $this->assertEquals('Big Town', $user->fresh()->city);
        $this->assertEquals('1980-01-01', $user->fresh()->birthday->format('Y-m-d'));
        $this->assertEquals('Beethoven', $user->fresh()->teacher);
        $this->assertEquals(2, $user->fresh()->musicalInstrument()->first()->id);
    }
}
