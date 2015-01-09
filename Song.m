//
//  Song.m
//  Stage
//
//  Created by Joubin Jabbari on 12/29/14.
//  Copyright (c) 2014 Joubin Jabbari. All rights reserved.
//

#import "Song.h"

@implementation Song{
    PFObject *data;
}
-(id) initWithPFObject:(PFObject *)object{
    self = [super init];
    if (self) {
        data = object;
    }
    return self;
}

-(AVAudioPlayer *)getAudioFile{
    AVAudioPlayer *audio_player;
    NSString *path = [NSString stringWithFormat:@"%@/%@", [[NSBundle mainBundle] resourcePath], [data objectForKey:@"audio_path"]];
    NSURL *url = [NSURL fileURLWithPath:path];
    audio_player = [[AVAudioPlayer alloc]
                    initWithContentsOfURL:url error:nil];
    audio_player.currentTime = 0; //this could be outside the if if you want it to start over when they hit play
    [audio_player play];

    MPMediaItemArtwork *albumArt = [[MPMediaItemArtwork alloc] initWithImage:[UIImage imageNamed:@"blue"]];
    
    NSDictionary *info = @{ MPMediaItemPropertyArtist: @"joubin",
                            MPMediaItemPropertyAlbumTitle: @"Alb",
                            MPMediaItemPropertyTitle: @"song",
                            MPMediaItemPropertyPlaybackDuration: [NSNumber numberWithFloat:[audio_player duration]],
                            MPMediaItemPropertyArtwork: albumArt};
    

    return audio_player;

}
@end
