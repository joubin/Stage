//
//  GetData.m
//  Stage
//
//  Created by Joubin Jabbari on 12/20/14.
//  Copyright (c) 2014 Joubin Jabbari. All rights reserved.
//

#import "GetData.h"

@implementation GetData{
    CALayer* uiLayer;

}

- (instancetype)init
{
    self = [super init];

    if (self) {
        [self addTarget:self action:@selector(stateChanged:) forControlEvents:UIControlEventValueChanged];
        
    }
    return self;
}

- (void)stateChanged:(UISwitch *)switchState{
    if ([switchState isOn]) {
        [[NSNotificationCenter defaultCenter] postNotificationName:@"activatedDownload" object:[NSNumber numberWithBool:YES]];
    } else {
        [[NSNotificationCenter defaultCenter] postNotificationName:@"deactivatedDownload" object:[NSNumber numberWithBool:NO]];
    }
}




@end
