declare namespace App.Http.Resources {
export type EventResource = {
name: string;
venue_id: number;
tracks: Array<App.Http.Resources.TrackResource>;
};
export type OptionResource = {
value: string | number;
label: string;
};
export type SessionResource = {
id: number | null;
name: string;
starts_at: string;
ends_at: string;
};
export type TrackResource = {
id: number | null;
name: string;
sessions: Array<App.Http.Resources.SessionResource>;
};
}
declare namespace App.Http.ViewModels.Inertia {
export type EventViewModel = {
method: string;
action: string;
event: App.Http.Resources.EventResource | null;
venues: Array<App.Http.Resources.OptionResource>;
};
}
